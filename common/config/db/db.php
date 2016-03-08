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
$host = getParamsFromFile(__DIR__ . '/mysql/host.php', 'localhost');
$dbname = getParamsFromFile(__DIR__ . '/mysql/dbname.php', 'rho.social');

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host=$host;dbname=$dbname",
    'username' => getParamsFromFile(__DIR__ . '/mysql/username.php', 'root'),
    'password' => getParamsFromFile(__DIR__ . '/mysql/password.php', ''),
    'tablePrefix' => getParamsFromFile(__DIR__ . '/mysql/tablePrefix.php', ''),
    'charset' => getParamsFromFile(__DIR__ . '/mysql/charset.php', 'utf8mb4'),
    'enableSchemaCache' => true,
];
