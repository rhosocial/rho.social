<?php

Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('rho', dirname(dirname(__DIR__)) . '/rho.social');
Yii::setAlias('rho_admin', dirname(dirname(__DIR__)) . '/admin.rho.social');
Yii::setAlias('rho_api', dirname(dirname(__DIR__)) . '/api.rho.social');
Yii::setAlias('rho_contact', dirname(dirname(__DIR__)) . '/contact.rho.social');
Yii::setAlias('rho_express', dirname(dirname(__DIR__)) . '/express.rho.social');
Yii::setAlias('rho_dev', dirname(dirname(__DIR__)) . '/dev.rho.social');
Yii::setAlias('rho_message', dirname(dirname(__DIR__)) . '/message.rho.social');
Yii::setAlias('rho_my', dirname(dirname(__DIR__)) . '/my.rho.social');
Yii::setAlias('rho_reg', dirname(dirname(__DIR__)) . '/reg.rho.social');
Yii::setAlias('rho_sso', dirname(dirname(__DIR__)) . '/sso.rho.social');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('console_test', dirname(dirname(__DIR__)) . '/console_test');

function loadAndDefaults($filename, $default = '')
{
    $value = '';
    if (file_exists($filename)) {
        $value = require($filename);
    } else {
        $value = $default;
    }
    return $value;
}
//$baseDomain = loadAndDefaults(__DIR__ . '/base/baseDomain.php');
$baseDomain = loadAndDefaults(__DIR__ . '/base/baseDomain-local.php');
defined('BASE_DOMAIN') or define('BASE_DOMAIN', $baseDomain);
