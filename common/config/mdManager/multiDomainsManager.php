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
    'class' => 'vistart\Models\components\MultiDomainsManager',
    'baseDomain' => $baseDomain,
    'subDomains' => [
        '' => [
            'component' => require(__DIR__ . '/../../../rho.social/config/urlManager.php'),
        ],
        'my' => [
            'component' => require(__DIR__ . '/../../../my.rho.social/config/urlManager.php'),
        ],
        'reg' => [
            'component' => require(__DIR__ . '/../../../reg.rho.social/config/urlManager.php'),
        ],
        'sso' => [
            'component' => require(__DIR__ . '/../../../sso.rho.social/config/urlManager.php'),
        ],
    ],
];