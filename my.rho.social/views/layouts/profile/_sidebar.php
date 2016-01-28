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
use rho\modules\user\controllers\MyController;
use kartik\icons\Icon;
use yii\helpers\Url;
?>
<?= YII_ENV_DEV ? "<!-- the beginning of layouts/my/_sidebar -->" : "" ?>
<div class="panel panel-default hidden-xs">
    <div class="panel-heading">
        <strong><?= Icon::show('user', [], Icon::BSG) ?> <?= MyController::t('', 'Profile') ?></strong>
<?= MyController::t('', 'Nav') ?>
    </div>
    <hr/>
    <div class="list-group">
        <a class="list-group-item<?= $this->params['item'] == 'profile' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/profile') . '"' ?>
           >
            <span><?= MyController::t('', 'Profile') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'phone' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/phone') . '"' ?>
           >
            <span><?= MyController::t('', 'Phone') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'email' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/email') . '"' ?>
           >
            <span><?= MyController::t('', 'Email') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'im' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/im') . '"' ?>
           >
            <span><?= MyController::t('', 'Instant Message') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'address' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/address') . '"' ?>
           >
            <span><?= MyController::t('', 'Address') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'anniversary' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/anniversary') . '"' ?>
           >
            <span><?= MyController::t('', 'Anniversary') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'url' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/url') . '"' ?>
           >
            <span><?= MyController::t('', 'URL') ?></span>
        </a>
        <hr/>
        <a class="list-group-item<?= $this->params['item'] == 'job' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/job') . '"' ?>
           >
            <span><?= MyController::t('', 'Job Career') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'edu' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/edu') . '"' ?>
           >
            <span><?= MyController::t('', 'Education Career') ?></span>
        </a>
        <hr/>
        <a class="list-group-item<?= $this->params['item'] == 'skill' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/skill') . '"' ?>
           >
            <span><?= MyController::t('', 'Skill') ?></span>
        </a>
        <a class="list-group-item<?= $this->params['item'] == 'favorite' ? ' active' : '' ?>"
<?= ' href="' . Url::toRoute('my/favorite') . '"' ?>
           >
            <span><?= MyController::t('', 'Favorite') ?></span>
        </a>
    </div>
</div>
<?= YII_ENV_DEV ? "<!-- the end of layouts/my/_sidebar -->" : "" ?>
