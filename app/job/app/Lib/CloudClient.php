<?php
/**
 * Created by PhpStorm.
 * User: brewlin
 * Date: 2019/6/25 0025
 * Time: 下午 2:50
 */

namespace App\Lib;


use Core\Container\Container;
use Discovery\Balancer\RandomBalancer;
use Grpc\ChannelCredentials;

class CloudClient
{
    /**
     * servicelist
     * [
     *      "127.0.0.1:9500"
     * ]
     * @var array
     */
    public static $serviceList = [];

    /**
     * 返回一个可用的grpc 客户端 和logic 节点进行交互
     * @return \Im\Cloud\CloudClient
     * @throws \Exception
     */
    public static function getCloudClient($serverId = ""){
        if($serverId)
            $node = self::$serviceList[$serverId];
        else
            $node = Container::getInstance()->get(RandomBalancer::class)->select(self::$serviceList);
        if(empty($node))return null;
        $client = new \Im\Cloud\CloudClient($node,[
            'credentials' => ChannelCredentials::createInsecure()
        ]);
        $client->start();
        return $client;
    }

    /**
     * @param $server
     */
    public static function updateService($server)
    {
        self::$serviceList = $server;
    }
}