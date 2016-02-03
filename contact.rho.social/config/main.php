<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => require(__DIR__ . '/id.php'),
    'name' => $params['title']['main'] . ' ' . $params['title']['social'],
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'default',
    'controllerNamespace' => 'rho_contact\controllers',
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
                'contact*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@rho_contact/messages',
                ],
            ]
        ]
    ],
    'params' => $params,
];
