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
$username = require(__DIR__ . '/mysql/username.php');
$password = require(__DIR__ . '/mysql/password.php');
$host = require(__DIR__ . '/mysql/host.php');
$dbname = require(__DIR__ . '/mysql/dbname.php');
$tablePrefix = require(__DIR__ . '/mysql/tablePrefix.php');
$charset = require(__DIR__ . '/mysql/charset.php');

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host=$host;dbname=$dbname",
    'username' => $username,
    'password' => $password,
    'tablePrefix' => $tablePrefix,
    'charset' => $charset,
    'enableSchemaCache' => true,
];
