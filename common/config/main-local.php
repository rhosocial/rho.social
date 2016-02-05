<?php

$dbLocalFile = __DIR__ . '/db/db-local.php';
$dbLocalParams = file_exists($dbLocalFile) ? require($dbLocalFile) : [];

$mailerLocalFile = __DIR__ . '/mailer/mailer-local.php';
$mailerLocalParams = file_exists($mailerLocalFile) ? require($mailerLocalFile) : [];

$requestLocalFile = __DIR__ . '/request/request-local.php';
$requestLocalParams = file_exists($requestLocalFile) ? require($requestLocalFile) : [];

$logLocalFile = __DIR__ . '/log/log-local.php';
$logLocalParams = file_exists($logLocalFile) ? require($logLocalFile) : [];

$redisLocalFile = __DIR__ . '/redis/redis-local.php';
$redisLocalParams = file_exists($redisLocalFile) ? require($redisLocalFile) : [];

$sessionLocalFile = __DIR__ . '/redis/redis.session.php';
$sessionLocalParams = file_exists($sessionLocalFile) ? require($sessionLocalFile) : [];
return [
    'components' => [
        'db' => $dbLocalParams,
        'mailer' => $mailerLocalParams,
        'request' => $requestLocalParams,
        'log' => $logLocalParams,
        'redis' => $redisLocalParams,
        'session' => $sessionLocalParams,
    ],
];
