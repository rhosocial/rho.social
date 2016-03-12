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
    'id' => getParamsFromFile(__DIR__ . '/id.php', 'rho_social_contact'),
    'name' => $params['title']['main'] . ' ' . $params['title']['social'],
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'contact',
    'controllerNamespace' => 'rho_contact\controllers',
    'modules' => getParamsFromFile(__DIR__ . '/modules.php'),
    'components' => [
        'log' => getParamsFromFile(__DIR__ . '/log.php'),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => getParamsFromFile(__DIR__ . '/urlManager.php'),
        'cache' => getParamsFromFile(__DIR__ . '/redis/redis.cache.php', null),
        'i18n' => [
            'translations' => [
                'contact*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@rho_contact/messages',
                ],
            ]
        ],
    ],
    'params' => $params,
];
