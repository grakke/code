<?php

use Application\services\Printer\PrinterProvider;
use Application\services\Store\StoreProvider;
use Application\services\View\ViewProvider;

return [
    'app' => [
        'name' => 'Henry 的个人网站',
        'desc' => '让学习与进取者不再孤独',
        'url' => 'https://xueyuanjun.com',
        'basePath' => __DIR__ . '/../',
        'store' => [
            'default' => 'mysql',
            'drivers' => [
                'mysql' => [
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => 3306,
                    'database' => 'blog',
                    'charset' => 'utf8mb4',
                    'username' => 'blog',
                    'password' => 'blog',
                    'collation' => 'utf8mb4_general_ci',
                    'prefix' => '',
                ]
            ]
        ],
        'editor' => 'html',  // 支持html和markdown
        'providers' => [
            StoreProvider::class,
            PrinterProvider::class,
            ViewProvider::class,
        ],
    ],
    'view' => [
        'engine' => 'php',  // 视图模板引擎
        'path' => __DIR__ . '/../resources/views/',
    ],
    'session' => [
        'lifetime' => 2 * 60 * 60
    ],
];
