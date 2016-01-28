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
use yii\bootstrap\Nav;
use rho_my\helpers\ViewHelper as vh;

$this->title .= Yii::t('my', 'Profile');
$this->params['topbar_second'] = [
    'profile' => [
        'label' => Yii::t('my', 'Profile'),
        'url' => Url::toRoute('/profile'),
        'icon' => '<i class="fa fa-user"></i>',
        'isActive' => $this->params['item'] == 'profile',
    ],
    'phone' => [
        'label' => Yii::t('my', 'Phone'),
        'url' => Url::toRoute('/phone'),
        'icon' => '<i class="fa fa-phone"></i>',
        'isActive' => $this->params['item'] == 'phone',
    ],
    'email' => [
        'label' => Yii::t('my', 'Email'),
        'url' => Url::toRoute('/email'),
        'icon' => '<i class="fa fa-envelope"></i>',
        'isActive' => $this->params['item'] == 'email',
    ],
    'im' => [
        'label' => Yii::t('my', 'Instant Message'),
        'url' => Url::toRoute('/im'),
        'icon' => '<i class="fa fa-share"></i>',
        'isActive' => $this->params['item'] == 'im',
    ],
    'address' => [
        'label' => Yii::t('my', 'Address'),
        'url' => Url::toRoute('/address'),
        'icon' => '<i class="fa fa-map-marker"></i>',
        'isActive' => $this->params['item'] == 'address',
    ],
    'anniversary' => [
        'label' => Yii::t('my', 'Anniversary'),
        'url' => Url::toRoute('/anniversary'),
        'icon' => '<i class="fa fa-calendar"></i>',
        'isActive' => $this->params['item'] == 'anniversary',
    ],
    'url' => [
        'label' => Yii::t('my', 'URL'),
        'url' => Url::toRoute('/url'),
        'icon' => '<i class="fa fa-link"></i>',
        'isActive' => $this->params['item'] == 'url',
    ],
    'job' => [
        'label' => Yii::t('my', 'Job Career'),
        'url' => Url::toRoute('my/job'),
        'icon' => '<i class="fa fa-job"></i>',
        'isActive' => $this->params['item'] == 'job',
    ],
    'edu' => [
        'label' => Yii::t('my', 'Education Career'),
        'url' => Url::toRoute('/edu'),
        'icon' => '<i class="fa fa-edu"></i>',
        'isActive' => $this->params['item'] == 'edu',
    ],
    'skill' => [
        'label' => Yii::t('my', 'Skill'),
        'url' => Url::toRoute('/skill'),
        'icon' => '<i class="fa fa-skill"></i>',
        'isActive' => $this->params['item'] == 'skill',
    ],
    'favorite' => [
        'label' => Yii::t('my', 'Favorite'),
        'url' => Url::toRoute('/favorite'),
        'icon' => '<i class="fa fa-favorite"></i>',
        'isActive' => $this->params['item'] == 'favorite',
    ],
];
$this->params['topbar_second_visible_md'] = true;
//[['isActive' => true, 'icon' => '<i class="fa fa-user"></i>', 'label' => 'main', 'url' => Url::toRoute('my/profile'), 'htmlOptions' => '']];
?>
<?php $this->beginContent('@rho_my/views/layouts/main.php'); ?>
<?= vh::markBegin('layouts/profile/main') ?>
<div class="row">
    <div class="col-md-9 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Profile</strong>
            </div>
            <hr>
            <div class="panel-body">
                <?php
                echo Nav::widget([
                    'items' => [
                        [
                            'label' => 'Basic',
                            'url' => ['/profile/basic'],
                        ],
                        [
                            'label' => 'Icon',
                            'url' => ['/profile/icon'],
                        ],
                        [
                            'label' => 'Location',
                            'url' => ['/profile/location'],
                        ],
                        [
                            'label' => 'Preferences',
                            'url' => ['/profile/preference'],
                        ],
                    ],
                    'options' => ['class' => 'nav-tabs'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
                <?= $content ?>
            </div>
        </div>
    </div>
    <div class="profile-nav-container col-md-3 col-sm-4">
        <?php //$this->render('_sidebar')  ?>
    </div>
</div>
<?= vh::markEnd('layouts/profile/main') ?>
<?php $this->endContent(); ?>