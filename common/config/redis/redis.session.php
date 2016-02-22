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
    'class' => 'yii\redis\Session',
    'keyPrefix' => loadAndDefaults(__DIR__ . '/keyPrefix.php', 'rho_local_sess_'),
    'redis' => 'redis',
    'name' => loadAndDefaults(__DIR__ . '/name.php', 'RHO_LOCAL_SESSID_'),
    'cookieParams' => ['domain' => '.' . BASE_DOMAIN, 'lifetime' => 0]
];
