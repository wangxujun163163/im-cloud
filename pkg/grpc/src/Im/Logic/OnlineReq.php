<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: logic.proto

namespace Im\Logic;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>im.logic.OnlineReq</code>
 */
class OnlineReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string server = 1;</code>
     */
    private $server = '';
    /**
     * Generated from protobuf field <code>map<string, int32> roomCount = 2;</code>
     */
    private $roomCount;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $server
     *     @type array|\Google\Protobuf\Internal\MapField $roomCount
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Logic::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string server = 1;</code>
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Generated from protobuf field <code>string server = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setServer($var)
    {
        GPBUtil::checkString($var, True);
        $this->server = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>map<string, int32> roomCount = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getRoomCount()
    {
        return $this->roomCount;
    }

    /**
     * Generated from protobuf field <code>map<string, int32> roomCount = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setRoomCount($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::INT32);
        $this->roomCount = $arr;

        return $this;
    }

}

