<?php

return [
    'class' => '\framework\src\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=tests',
    'username' => 'blog',
    'password' => 'blog',
    'attributes' => [
        \PDO::ATTR_EMULATE_PREPARES => false,
        \PDO::ATTR_STRINGIFY_FETCHES => false,
    ],
];
