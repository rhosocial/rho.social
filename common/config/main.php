<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => require(__DIR__ . '/bootstrap/bootstrap.php'),
    'modules' => require(__DIR__ . '/modules/modules.php'),
    'components' => [
        'user' => require(__DIR__ . '/user/user.php'),
        'db' => require (__DIR__ . '/db/db.php'),
        'formatter' => require (__DIR__ . '/formatter/formatter.php'),
        'log' => require(__DIR__ . '/log/log.php'),
        //'assetManager' => require(__DIR__ . '/assetManager/assetManager.php'),
        'mailer' => require(__DIR__ . '/mailer/mailer.php'),
        'regionDb' => require(__DIR__ . '/region_db/region_db.php'),
        'mongodb' => require(__DIR__ . '/mongodb/mongodb.php'),
        'i18n' => require(__DIR__ . '/i18n/i18n.php'),
        'authManager' => require(__DIR__ . '/authManager/authManager.php'),
        'request' => require(__DIR__ . '/request/request.php'),
        'multiDomainsManager' => require(__DIR__ . '/mdManager/multiDomainsManager.php'),
        'redis' => require(__DIR__ . '/redis/redis.php'),
        'session' => require(__DIR__ . '/redis/session.php'),
    ],
];
