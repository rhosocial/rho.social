<?php

function getParamsFromFile($file)
{
    return file_exists($file) ? require($file) : [];
}
return [
    'components' => [
        'db' => getParamsFromFile(__DIR__ . '/db/db-local.php'),
        'mailer' => getParamsFromFile(__DIR__ . '/mailer/mailer-local.php'),
        'request' => getParamsFromFile(__DIR__ . '/request/request-local.php'),
        'log' => getParamsFromFile(__DIR__ . '/log/log-local.php'),
        'redis' => getParamsFromFile(__DIR__ . '/redis/redis-local.php'),
        'session' => getParamsFromFile(__DIR__ . '/redis/redis.session.php'),
    ],
];
