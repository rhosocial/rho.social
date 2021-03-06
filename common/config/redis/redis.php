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
    'hostname' => getParamsFromFile(__DIR__ . '/hostname.php', 'localhost'),
    'port' => getParamsFromFile(__DIR__ . '/port.php', 6379),
    'database' => getParamsFromFile(__DIR__ . '/database.php', 0),
    'password' => getParamsFromFile(__DIR__ . '/password.php', null),
];