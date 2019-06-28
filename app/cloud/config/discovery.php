<?php

return [
    'consul' => [
        'address' => env("DISCOVERY_ADDRESS","127.0.0.1"),
        'port'    => env("DISCOVERY_PORT","8500"),
        'register' => [
            'ID'                => '',
            //只注册了grpc 服务，其他都是私有的
            //tcp 和websocket   通过nginx负载均衡即可
            'Name'              => 'grpc-im-cloud-node',
            'Tags'              => [],
            'enableTagOverride'=> false,
            'Address'           => '127.0.0.1',
            'Port'              => (int)env("HTTP_PORT",9500),
            'Check'             => [
                'id'       => '',
                'name'     => '',
                'http'      => "http://127.0.0.1:".env('HTTP_PORT',9500)."/health",
                'interval' => "10s",
                'timeout'  => "10s",
            ],
        ],
        'discovery' => [
            'name' => 'im-logic',
            'dc' => 'dc1',
            'near' => '',
            'tag' =>'',
            'passing' => true
        ]
    ],
];