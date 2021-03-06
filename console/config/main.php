<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */
$params = [];
$params = array_merge($params, getParamsFromFile(__DIR__ . '/../../common/config/params.php'));
$params = array_merge($params, getParamsFromFile(__DIR__ . '/../../common/config/params-local.php'));
$params = array_merge($params, getParamsFromFile(__DIR__ . '/params.php'));
$params = array_merge($params, getParamsFromFile(__DIR__ . '/params-local.php'));

return [
    'id' => 'rhosocial-console',
    'name' => 'rho.social console application for test',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'user' => [
            'class' => 'console\modules\user\Module',
        ],
    ],
    'components' => [
        'redis' => getParamsFromFile(__DIR__ . '/../../common/config/redis/redis.php'),
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis',
        ],
        'db' => getParamsFromFile(__DIR__ . '/../../common/config/db/db.php'),
    ],
    'params' => $params,
];
