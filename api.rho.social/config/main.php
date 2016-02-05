<?php

use yii\web\Response;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => require(__DIR__ . '/id.php'),
    'name' => $params['title']['main'] . ' ' . $params['title']['sub'] . ' API',
    'language' => require(__DIR__ . '/language.php'),
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'rho_api\controllers',
    'bootstrap' => [
        'log',
        [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
                'application/xml' => Response::FORMAT_XML,
                'text/html' => Response::FORMAT_JSON,
            ],
            'languages' => [
                'zh-CN',
                'en-US',
            ],
        ],
    ],
    'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        'user' => [
            'identityClass' => 'common\models\user\User',
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'log' => require(__DIR__ . '/log.php'),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'class' => 'yii\web\Request',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MtKQTb12a9akI5BGojU2Zq_2piqxOq14',
            'csrfParam' => '_api_csrf',
        ],
        'urlManager' => require(__DIR__ . '/urlManager.php'),
        'response' => require(__DIR__ . '/response.php'),
        'cache' => require(__DIR__ . '/redis/redis.cache.php'),
    ],
    'params' => $params,
];
