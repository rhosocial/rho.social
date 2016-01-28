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
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use rho_my\helpers\ViewHelper as vh;
use rho_my\widgets\NotificationAlertWidget as na;
use rho_my\controllers\ProfileController;

$this->params['item'] = 'profile';
$this->params['profile'] = 'basic';
$activeFieldTemplate = [
    'oneOfRow' => '<div class="col-md-2">{label}</div>'
    . '<div class="col-md-10">{input}</div>'
    . '<div class="col-md-offset-2 col-md-10">{error}</div>',
    'twoOfRow' => '<div class="col-md-4">{label}</div>'
    . '<div class="col-md-8">{input}</div>'
    . '<div class="col-md-offset-4 col-md-8">{error}</div>',
];
?>
<?= vh::markBegin('message') ?>
<?php $message = ProfileController::getFlashNotifification(ProfileController::SESSKEY_MY_PROFILE_BASIC) ?>
<?php if (is_array($message)): ?>
    <?= na::widget($message) ?>
<?php endif; ?>
<?= vh::markEnd('message') ?>

<?php $formId = 'user_profile_basic_form' ?>
<?= vh::markBegin($formId) ?>
<?php $form = ActiveForm::begin(['id' => $formId]) ?>

<?php $nicknameAttribute = 'nickname'; ?>
<?=
vh::divWithMark($nicknameAttribute, $form->field($profile, $nicknameAttribute, [
        'template' => $activeFieldTemplate['oneOfRow'],
]))
?>

<?php $firstNameAttribute = 'first_name'; ?>
<?php $lastNameAttribute = 'last_name'; ?>
<?=
vh::divWithMark('name', vh::divWithMark($firstNameAttribute, $form->field($profile, $firstNameAttribute, [
            'template' => $activeFieldTemplate['twoOfRow'],
        ]), true, 'col-md-6') .
    vh::divWithMark($lastNameAttribute, $form->field($profile, $lastNameAttribute, [
            'template' => $activeFieldTemplate['twoOfRow'],
        ]), true, 'col-md-6')
)
?>
<div class="row">
    <div class="form-group">
        <div class="col-md-offset-2" style="padding: 0px 15px;">
            <?= Html::submitButton(Yii::t('my', 'Submit'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::t('my', 'Reset'), ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>
<?= vh::markEnd($formId) ?>