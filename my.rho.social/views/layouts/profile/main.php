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
use yii\bootstrap\Nav;
use rho_my\helpers\ViewHelper as vh;

$this->title .= Yii::t('my', 'Profile');
?>
<?php $this->beginContent('@rho_my/views/layouts/main.php'); ?>
<?= vh::markBegin('layouts/profile/main') ?>
<div class="row">
    <div class="col-md-9 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?= Yii::t('my', 'Profile') ?></strong>
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