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
    'profile' => [
        'label' => Yii::t('my', 'Profile'),
        'url' => Url::toRoute('/profile'),
        'icon' => '<i class="fa fa-user"></i>',
        'isActive' => Yii::$app->controller->id == 'profile',
    ],
    'phone' => [
        'label' => Yii::t('my', 'Phone'),
        'url' => Url::toRoute('/phone'),
        'icon' => '<i class="fa fa-phone"></i>',
        'isActive' => Yii::$app->controller->id == 'phone',
    ],
    'email' => [
        'label' => Yii::t('my', 'Email'),
        'url' => Url::toRoute('/email'),
        'icon' => '<i class="fa fa-envelope"></i>',
        'isActive' => Yii::$app->controller->id == 'email',
    ],
    'im' => [
        'label' => Yii::t('my', 'Instant Message'),
        'url' => Url::toRoute('/im'),
        'icon' => '<i class="fa fa-share"></i>',
        'isActive' => Yii::$app->controller->id == 'im',
    ],
    'address' => [
        'label' => Yii::t('my', 'Address'),
        'url' => Url::toRoute('/address'),
        'icon' => '<i class="fa fa-map-marker"></i>',
        'isActive' => Yii::$app->controller->id == 'address',
    ],
    'anniversary' => [
        'label' => Yii::t('my', 'Anniversary'),
        'url' => Url::toRoute('/anniversary'),
        'icon' => '<i class="fa fa-calendar"></i>',
        'isActive' => Yii::$app->controller->id == 'anniversary',
    ],
    'url' => [
        'label' => Yii::t('my', 'URL'),
        'url' => Url::toRoute('/url'),
        'icon' => '<i class="fa fa-link"></i>',
        'isActive' => Yii::$app->controller->id == 'url',
    ],
    'job' => [
        'label' => Yii::t('my', 'Job Career'),
        'url' => Url::toRoute('/job'),
        'icon' => '<i class="fa fa-job"></i>',
        'isActive' => Yii::$app->controller->id == 'job',
    ],
    'edu' => [
        'label' => Yii::t('my', 'Education Career'),
        'url' => Url::toRoute('/edu'),
        'icon' => '<i class="fa fa-edu"></i>',
        'isActive' => Yii::$app->controller->id == 'education',
    ],
    'skill' => [
        'label' => Yii::t('my', 'Skill'),
        'url' => Url::toRoute('/skill'),
        'icon' => '<i class="fa fa-skill"></i>',
        'isActive' => Yii::$app->controller->id == 'skill',
    ],
    'favorite' => [
        'label' => Yii::t('my', 'Favorite'),
        'url' => Url::toRoute('/favorite'),
        'icon' => '<i class="fa fa-favorite"></i>',
        'isActive' => Yii::$app->controller->id == 'favorite',
    ],
];
$this->params['topbar_second_visible_md'] = true;
