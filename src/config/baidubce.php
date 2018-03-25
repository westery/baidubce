<?php

return [
        //百度bce
        'default' => [
            "ak" => env('BAIDU_AK',"0b0f67dfb88244b289b72b142befad0c"),
            "sk" => env('BAIDU_SK',"bad522c2126a4618a8125f4b6cf6356f")
        ],
        'host' => env('BAIDU_HOST','iot.bj.baidubce.com'),
        'msg_host' => env('BAIDU_MSG_HOST','api.mqtt.iot.bj.baidubce.com/v1/proxy'),
        'tsdb_host' => env('BAIDU_TSDB_HOST','tsdb.iot.bj.baidubce.com'),
];
