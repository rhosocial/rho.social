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
use yii\helpers\Url;

$this->params['topbar_second'] = [
    'contact' => [
        'label' => Yii::t('contact', 'Contacts'),
        'url' => Url::toRoute(''),
        'icon' => '<i class="fa fa-user"></i>',
        'isActive' => Yii::$app->controller->id == 'contact',
    ],
];
$this->params['topbar_second_visible_md'] = true;
