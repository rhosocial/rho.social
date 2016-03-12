<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */
$params = require(__DIR__ . '/load_params.php');

return [
    'id' => require(__DIR__ . '/id.php'),
    'name' => $params['title']['main'] . ' ' . $params['title']['social'],
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'rho_sso\controllers',
    'defaultRoute' => 'sso',
    'modules' => require(__DIR__ . '/modules.php'),
    //'language' => require(__DIR__ . '/language.php'),
    'components' => [
        'errorHandler' => [
            'errorAction' => 'sso/error',
        ],
        'urlManager' => require(__DIR__ . '/urlManager.php'),
        'cache' => require(__DIR__ . '/redis/redis.cache.php'),
        'i18n' => [
            'translations' => [
                'sso*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@rho_sso/messages',
                ],
            ],
        ],
    ],
    'params' => $params,
];
