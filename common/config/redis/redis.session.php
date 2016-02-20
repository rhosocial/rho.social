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
$keyPrefix = require(__DIR__ . '/keyPrefix.php');
$name = require(__DIR__ . '/name.php');
return [
    'class' => 'yii\redis\Session',
    'keyPrefix' => $keyPrefix,
    'redis' => 'redis',
    'name' => $name,
    'cookieParams' => ['domain' => '.' . BASE_DOMAIN, 'lifetime' => 0]
];
