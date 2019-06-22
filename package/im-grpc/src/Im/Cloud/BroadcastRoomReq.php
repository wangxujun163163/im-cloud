<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: cloud.proto

namespace Im\Cloud;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>im.cloud.BroadcastRoomReq</code>
 */
class BroadcastRoomReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string roomID = 1;</code>
     */
    private $roomID = '';
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
     *     @type string $roomID
     *     @type \Im\Cloud\Proto $proto
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Cloud::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string roomID = 1;</code>
     * @return string
     */
    public function getRoomID()
    {
        return $this->roomID;
    }

    /**
     * Generated from protobuf field <code>string roomID = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setRoomID($var)
    {
        GPBUtil::checkString($var, True);
        $this->roomID = $var;

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
