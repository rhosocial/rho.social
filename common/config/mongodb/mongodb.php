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
$username = loadAndDefaults(__DIR__ . '/username.php');
$password = loadAndDefaults(__DIR__ . '/password.php');
$host = loadAndDefaults(__DIR__ . '/host.php', 'localhost');
$database = loadAndDefaults(__DIR__ . '/database.php');
$port = loadAndDefaults(__DIR__ . '/port.php', 27017);
return [
    'class' => '\yii\mongodb\Connection',
    'dsn' => "mongodb://$username:$password@$host:$port/$database",
];
