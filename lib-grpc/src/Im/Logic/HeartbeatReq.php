<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: logic.proto

namespace Im\Logic;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>im.logic.HeartbeatReq</code>
 */
class HeartbeatReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 mid = 1;</code>
     */
    private $mid = 0;
    /**
     * Generated from protobuf field <code>string key = 2;</code>
     */
    private $key = '';
    /**
     * Generated from protobuf field <code>string server = 3;</code>
     */
    private $server = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $mid
     *     @type string $key
     *     @type string $server
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Logic::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 mid = 1;</code>
     * @return int|string
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Generated from protobuf field <code>int64 mid = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMid($var)
    {
        GPBUtil::checkInt64($var);
        $this->mid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string key = 2;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Generated from protobuf field <code>string key = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->key = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string server = 3;</code>
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Generated from protobuf field <code>string server = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setServer($var)
    {
        GPBUtil::checkString($var, True);
        $this->server = $var;

        return $this;
    }

}

