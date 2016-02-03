<?php

/* 
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        'dbEmail' => [
            'class' => 'yii\log\EmailTarget',
            'levels' => YII_ENV_DEV ? ['error', 'warning'] : ['error'],
            'categories' => ['yii\db\*'],
            'message' => [
                'from' => ['webmaster@rho.social'],
                'to' => ['i@vistart.name', 'trazn@qq.com'],
                'subject' => 'Database errors at rho.social',
            ],
        ],
        'mongodbEmail' => [
            'class' => 'yii\log\EmailTarget',
            'levels' => YII_ENV_DEV ? ['error', 'warning'] : ['error'],
            'categories' => ['yii\mongodb\*'],
            'message' => [
                'from' => ['webmaster@rho.social'],
                'to' => ['i@vistart.name', 'trazn@qq.com'],
                'subject' => 'MongoDB errors rho.social',
            ],
        ],
        'redisEmail' => [
            'class' => 'yii\log\EmailTarget',
            'levels' => YII_ENV_DEV ? ['error', 'warning'] : ['error'],
            'categories' => ['yii\redis\*'],
            'message' => [
                'from' => ['webmaster@rho.social'],
                'to' => ['i@vistart.name', 'trazn@qq.com'],
                'subject' => 'Redis server errors at rho.social',
            ],
        ],
        'mongodb' => [
            'class' => 'yii\mongodb\log\MongoDbTarget',
            'levels' => YII_ENV_DEV ? 0 : ['error', 'warning'],
            'logCollection' => 'rho.log',
        ],
    ],
];