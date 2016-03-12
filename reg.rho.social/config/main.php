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
$params = require(__DIR__ . '/load_params.php');
;

return [
    'id' => require(__DIR__ . '/id.php'),
    'name' => $params['title']['main'] . ' ' . $params['title']['social'],
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'register',
    'controllerNamespace' => 'rho_reg\controllers',
    'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        'log' => require(__DIR__ . '/log.php'),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require(__DIR__ . '/urlManager.php'),
        'cache' => require(__DIR__ . '/redis/redis.cache.php'),
        'i18n' => [
            'translations' => [
                'reg*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@rho_reg/messages',
                ],
            ]
        ],
    ],
    'params' => $params,
];
