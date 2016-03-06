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
    'showScriptName' => false,
    'enablePrettyUrl' => true,
    'rules' => [
        '' => 'profile/basic',
        'profile' => 'profile/basic',
        '<controller:\w+>' => '<controller>/index',
        '<controller:\w+>/new' => '<controller>/new',
        '<controller:\w+>/update/<id:\w+>' => '<controller>/update',
        '<controller:\w+>/delete/<id:\w+>' => '<controller>/delete',
        '<controller:\w+>/validate/<id:\w+>' => '<controller>/validate',
    ],
];
