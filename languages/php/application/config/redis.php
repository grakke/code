<?php

return [
    'class' => '\framework\src\cache\RedisCache',
    'redis' => [
        'host' => 'localhost',
        'port' => 6379,
        'database' => 0,
        // 'password' =>'jun',
        // 'options' => [Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP],
    ]
];
