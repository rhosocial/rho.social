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
use rho_my\helpers\ViewHelper as vh;

$this->title .= Yii::t('my', 'Phone');
?>
<?php $this->beginContent('@rho_my/views/layouts/main.php'); ?>
<?= vh::markBegin('layouts/phone/main') ?>
<div class="row">
    <div class="col-md-9 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?= Yii::t('my', 'Phone') ?></strong>
            </div>
            <hr>
            <div class="panel-body">
                <?= $content ?>
            </div>
        </div>
    </div>
    <div class="profile-nav-container col-md-3 col-sm-4">
        <?php //$this->render('_sidebar')  ?>
    </div>
</div>
<?= vh::markEnd('layouts/phone/main') ?>
<?php $this->endContent(); ?>