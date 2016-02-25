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
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $title1 string */
/* @var $title2 string */
$ssoUrlManager = \Yii::$app->multiDomainsManager->get('sso');
$myUrlManager = \Yii::$app->multiDomainsManager->get('my');
?>
<?php if (Yii::$app->user->isGuest): ?>
    <?= Html::a('Sign in / up', $ssoUrlManager->createAbsoluteUrl('sso/login'), ['class' => 'btn btn-enter']); ?>
<?php else: ?>
    <ul class="nav">
        <li class="dropdown account">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="user-title pull-left hidden-xs">
                    <strong><?= Html::encode($title1); ?></strong><br/><span class="truncate"><?php echo Html::encode($title2); ?></span>
                </div>

                <img id="user-account-image" class="img-rounded"
                     src="<?= Yii::$app->request->baseUrl . '/img/default_user.jpg' ?>"
                     height="32" width="32" alt="32x32" data-src="holder.js/32x32"
                     style="width: 32px; height: 32px;"/>

                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <?= Html::a('<i class="fa fa-user"></i> ' . Yii::t('common', 'My Profile'), $myUrlManager->createAbsoluteUrl('profile')); ?>
                </li>
                <li>
                    <?= Html::a('<i class="fa fa-edit"></i> ' . Yii::t('common', 'Settings'), $myUrlManager->createAbsoluteUrl('setting')); ?>
                </li>
                <li class="divider"></li>
                <li>
                    <?= Html::a('<i class="fa fa-sign-out"></i> ' . Yii::t('common', 'Logout'), $ssoUrlManager->createAbsoluteUrl('sso/logout'), ['data-method' => 'post']); ?>
                </li>
            </ul>
        </li>
    </ul>
<?php endif; ?>

