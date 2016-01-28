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
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => require(__DIR__ . '/id.php'),
    'name' => $params['title']['main'] . ' ' . $params['title']['social'],
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'rho_sso\controllers',
    'defaultRoute' => 'sso',
    'modules' => require(__DIR__ . '/modules.php'),
    //'language' => require(__DIR__ . '/language.php'),
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ZQ0vZ8j9JOjyEurULC7AW0Peu8ECikeB',
        ],
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
