<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: logic.proto

namespace Im\Logic;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>im.logic.ReceiveReq</code>
 */
class ReceiveReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 mid = 1;</code>
     */
    private $mid = 0;
    /**
     * Generated from protobuf field <code>.im.cloud.Proto proto = 2;</code>
     */
    private $proto = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $mid
     *     @type \Im\Cloud\Proto $proto
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
     * Generated from protobuf field <code>.im.cloud.Proto proto = 2;</code>
     * @return \Im\Cloud\Proto
     */
    public function getProto()
    {
        return $this->proto;
    }

    /**
     * Generated from protobuf field <code>.im.cloud.Proto proto = 2;</code>
     * @param \Im\Cloud\Proto $var
     * @return $this
     */
    public function setProto($var)
    {
        GPBUtil::checkMessage($var, \Im\Cloud\Proto::class);
        $this->proto = $var;

        return $this;
    }

}

