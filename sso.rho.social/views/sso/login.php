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
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \rho_sso\models\LoginForm */
/* @var $homeUrl string */

$this->title = Yii::t('sso', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <?= Html::a('<b>' . Yii::$app->params['title']['main'] . '</b>' . ' ' . Yii::$app->params['title']['social'], $homeUrl) ?>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Yii::t('sso', 'Sign in to start your session') ?></p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'account', ['template' => "{input}\n{hint}\n{error}"])->textInput(['class' => 'form-control', 'placeholder' => $model->attributeLabels()['account']]) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'password', ['template' => "{input}\n{hint}\n{error}"])->passwordInput(['class' => 'form-control', 'placeholder' => $model->attributeLabels()['password']]) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">    
                <div class="checkbox icheck">
                    <label>
                        <?=
                        $form->field($model, 'rememberMe', [
                            'template' => "{input} " . $model->attributeLabels()['rememberMe'] . "\n{hint}\n{error}",
                        ])->checkbox([
                            'style' => "background: rgb(255, 255, 255); margin: 0px; padding: 0px; border: 0px currentColor; border-image: none; left: -20%; top: -20%; width: 140%; height: 140%; display: block; position: absolute; opacity: 0;",
                            ], false)
                        ?>
                    </label>
                </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton(Yii::t('sso', 'Sign In'), ['class' => 'btn btn-primary btn-block btn-flat', 'style' => 'margin-top: 6px;']) ?>
            </div><!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>
        <?= Yii::t('sso', 'Forgot your password?') ?> <?= Html::a(Yii::t('sso', 'reset it'), ['site/request-password-reset']) ?><br>
        <?php $regUrlManager = Yii::$app->multipleDomainsManager->get('reg'); ?>
        <?= Html::a(Yii::t('sso', 'Register a new membership'), $regUrlManager->createAbsoluteUrl(['register/index']), ['class' => 'text-center']) ?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->