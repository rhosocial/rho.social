<?php

/* 
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

return [
    'class' => 'yii\redis\Cache',
    'keyPrefix' => (require(__DIR__ . '/../id.php')) . '_' . (require(__DIR__ . '/../language.php')) . '_',
    'redis' => [
        'hostname' => require(__DIR__ . '/../../../common/config/redis/redis.hostname.php'),
        'port' => require(__DIR__ . '/../../../common/config/redis/redis.port.php'),
        'database' => require(__DIR__ . '/../../../common/config/redis/redis.database.php'),
        'password' => require(__DIR__ . '/../../../common/config/redis/redis.password.php'),
    ],
];