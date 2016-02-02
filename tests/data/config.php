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
/**
 * This is the configuration file for the Yii2 unit tests.
 * You can override configuration values by creating a `config.local.php` file
 * and manipulate the `$config` variable.
 * For example to change MySQL username and password your `config.local.php` should
 * contain the following:
 *
  <?php
  $config['databases']['mysql']['username'] = 'yiitest';
  $config['databases']['mysql']['password'] = 'changeme';

 */
$config = [
    'databases' => [
        'mysql' => [
            'dsn' => 'mysql:host=localhost;dbname=rho.social-test',
            'username' => 'root',
            'password' => '',
            'tablePrefix' => 'rho_',
            'charset' => 'utf8',
        ],
    ],
    'components' => [
        'multiDomainsManager' => [
            'class' => 'vistart\Models\components\MultiDomainsManager',
            'baseDomain' => 'rho.social',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                [
                    'pattern' => 'authorize',
                    'route' => 'api/authorize',
                    'suffix' => '',
                ],
                [
                    'pattern' => 'token',
                    'route' => 'api/token',
                    'suffix' => '',
                ],
            ],
        ],
    ],
];

if (is_file(__DIR__ . '/config.local.php')) {
    include(__DIR__ . '/config.local.php');
}

return $config;
