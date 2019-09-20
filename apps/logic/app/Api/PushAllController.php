<?php
/**
 * Created by PhpStorm.
 * User: brewlin
 * Date: 2019/6/28 0028
 * Time: 下午 5:47
 */

namespace App\Api;


use App\Task\LogicPush;
use Core\Container\Mapping\Bean;
use Core\Context\Context;
use ImQueue\Amqp\Consumer;
use Task\Task;

/**
 * Class PushAllController
 * @package App\Api
 * @Bean()
 */
class PushAllController extends BaseController
{
    /**
     * @return PushAllController|\Core\Http\Response\Response
     * @throws \Exception
     */
    public function all()
    {
        $post  = Context::get()->getRequest()->input();
        if(empty($post["operation"])){
            return $this->error("缺少参数");
        }
        $this->end();
        $arg = [
            "op" => $post["operation"],
            "msg" => $post["msg"]
        ];
        Task::deliver(LogicPush::class,"pushAll",[(int)$arg['op'],$arg['msg']]);
    }

}