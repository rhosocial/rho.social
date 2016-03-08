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
$username = getParamsFromFile(__DIR__ . '/username.php', 'rho_user');
$password = getParamsFromFile(__DIR__ . '/password.php', '123456');
$host = getParamsFromFile(__DIR__ . '/host.php', 'localhost');
$database = getParamsFromFile(__DIR__ . '/database.php', 'rho');
$port = getParamsFromFile(__DIR__ . '/port.php', 27017);
return [
    'class' => '\yii\mongodb\Connection',
    'dsn' => "mongodb://$username:$password@$host:$port/$database",
];
