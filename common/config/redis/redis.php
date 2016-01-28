<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

return [
    'class' => 'yii\redis\Connection',
    'hostname' => require(__DIR__ . '/redis.hostname.php'),
    'port' => require(__DIR__ . '/redis.port.php'),
    'database' => require(__DIR__ . '/redis.database.php'),
    'password' => require(__DIR__ . '/redis.password.php'),
];