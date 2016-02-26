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
return [
    'class' => 'vistart\components\web\SSOUser',
    'identityClass' => 'common\models\user\User',
    'enableAutoLogin' => true,
    'identityCookie' => require(__DIR__ . '/identityCookie.php'),
];
