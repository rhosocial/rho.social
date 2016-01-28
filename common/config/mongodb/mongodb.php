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
$username = require(__DIR__ . '/username.php');
$password = require(__DIR__ . '/password.php');
$host = require(__DIR__ . '/host.php');
$database = require(__DIR__ . '/database.php');
$port = require(__DIR__ . '/port.php');
return [
    'class' => '\yii\mongodb\Connection',
    'dsn' => "mongodb://$username:$password@$host:$port/$database",
];
