<?php
/**
 * Created by PhpStorm.
 * User: brewlin
 * Date: 2019/7/4 0004
 * Time: 下坈 3:11
 */

namespace App\Service\Dao;


use App\Service\Model\Online;
use Core\Co;
use Core\Container\Mapping\Bean;
use ImRedis\Redis;
use Log\Helper\Log;

/**
 * Class RedisDao
 * @package App\Service\Dao
 * @Bean()
 */
class RedisDao
{
    const _prefixMidServer    = "mid_%d"; // mid -> key:server
	const _prefixKeyServer    = "key_%s"; // key -> server
	const _prefixServerOnline = "ol_%s";  // server -> online
    public static $redisExpire = 20; //20s
    public function __construct()
    {
        self::$redisExpire = env("EXPIRE",20);
    }

    public function keyMidServer(int $mid)
    {
        return sprintf(self::_prefixMidServer, $mid);
    }

    public function keyKeyServer(string $key)
    {
        return sprintf(self::_prefixKeyServer, $key);
    }

    public function keyServerOnline(string $key)
    {
        return sprintf(self::_prefixServerOnline, $key);
    }


    /**
     * ServersByKeys get a server by key.
     * @param array $keys
     * @return array
     */
    public function getServersByKeys(array $keys)
    {
        $arg = [];
        foreach ($keys as $v){
            $arg[] = $this->keyKeyServer($v);
        }
        $res = Redis::mget($arg);
        Log::info("getServersByKeys mget input:".json_encode($keys)." output:".json_encode($res));
        return $res;
    }
    /**
     * @param array mids
     * @return array
     */
    public function getKeysByMids(array $mids)
    {
        $ress = [];
        foreach($mids as $mid){
            $ress = array_merge($ress,Redis::hgetall($this->keyMidServer($mid)));
        }
        Log::info("getKeysByMids hgetall input:".json_encode($mids)." output:".json_encode($ress));
        return $ress;
    }
    /**
     * ServerOnline get a server online.
     * @return Online
     */
    public function serverOnline(string $server)
    {
        $key = $this->keyServerOnline($server);
        $online = new Online();

	    for($i = 0; $i < 64; $i++) {
            $ol = $this->_serverOnline($key,$i);
            if($ol){
                $online->server = $ol['server'];
                if($ol["updated"] > $online->updated) {
                    $online->updated = $ol["updated"];
                }
                foreach ($ol["roomCount"] as $room => $count) {
                    $online->roomCount[$room] = $count;
                }
            }
		}
		return $online;
	}

    /**
     * @param $key
     * @param $hashKey
     * @return array
     */
	public function _serverOnline($key ,$hashKey)
    {
       return Redis::hGet($key,$hashKey);
    }

    /**
     * @param int $mid
     * @param string $key
     * @param string $server
     */
    public function addMapping(int $mid,string $key,string $server)
    {
        if($mid > 0){
            Redis::hSet($this->keyMidServer($mid),$key,$server);
            Redis::expire($this->keyMidServer($mid),self::$redisExpire);
            Log::info("addMapping hset $mid $key $server ");
        }
        Redis::set($this->keyKeyServer($key),$server);
        Redis::expire($this->keyKeyServer($key),self::$redisExpire);
        Log::info("addMapping set $mid $key $server");
    }

    /**
     * @param int $mid
     * @param string $key
     */
    public function expireMapping(int $mid,string $key)
    {
        if($mid > 0){
            Redis::expire($this->keyMidServer($mid),self::$redisExpire);
            Log::info("expiremapping $mid $key ".self::$redisExpire);
        }
        Redis::expire($this->keyKeyServer($key),self::$redisExpire);
        Log::info("expiremapping $mid $key ".self::$redisExpire);

    }

    /**
     * @param int $mid
     * @param string $key
     * @param string $server
     */
    public function delMapping(int $mid,string $key,string $server)
    {
        if($mid > 0 ){
            Log::info("delMapping hdel $mid $key $server");
            Redis::hDel($this->keyMidServer($mid),$key);
        }
        Log::info("delMapping del $key $mid $server");
        Redis::del($this->keyKeyServer($key));
    }

    public function addServerOnline(string $server,Online $online)
    {
        $roomMap = [];
        foreach ($online->roomCount as $room => $count)
        {

        }
    }
}