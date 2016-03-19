<?php

use common\models\user\profile\Profile;
use rho_reg\models\RegisterForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $error string */
/* @var $model RegisterForm */
$this->title = 'Register';
$this->registerJs('$(\'#modal-registration-notice\').modal();', yii\web\View::POS_READY);
$md = Yii::$app->multiDomainsManager;
$homeUrlManager = $md->get();
$ssoUrlManager = $md->get('sso');
?>
<div class="register-box">
    <div class="register-logo">
        <?= Html::a('<b>' . Yii::$app->params['title']['main'] . '</b>' . ' ' . Yii::$app->params['title']['social'], $homeUrlManager->createAbsoluteUrl('/site/index')) ?>
    </div>
    <div class="register-box-body">
        <p class="login-box-msg"><?= 'Register a new membership' ?></p>
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="col-xs-6">
                <?=
                $form->field($model, 'nickname', [
                    'options' => [
                        'class' => 'form-group',
                    ],
                    'template' => "{input}\n{hint}\n{error}",
                ])->textInput([
                    'class' => 'form-control',
                    'placeholder' => $model->attributeLabels()['nickname'],
                ])
                ?>
            </div>
            <div class="col-xs-6">
                <?=
                $form->field($model, 'gender', [
                    'options' => [
                        'class' => 'form-group',
                    ],
                    'template' => "{input}\n{hint}\n{error}",
                ])->dropDownList(Profile::$genders)
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <?=
                $form->field($model, 'first_name', [
                    'options' => [
                        'class' => 'form-group',
                    ],
                    'template' => "{input}\n{hint}\n{error}\n",
                ])->textInput([
                    'class' => 'form-control',
                    'placeholder' => $model->attributeLabels()['first_name'],
                ])
                ?>
            </div>
            <div class="col-xs-6">
                <?=
                $form->field($model, 'last_name', [
                    'options' => [
                        'class' => 'form-group',
                    ],
                    'template' => "{input}\n{hint}\n{error}\n",
                ])->textInput([
                    'class' => 'form-control',
                    'placeholder' => $model->attributeLabels()['last_name'],
                ])
                ?>
            </div>
        </div>
        <?=
        $form->field($model, 'password', [
            'options' => [
                'class' => 'form-group has-feedback',
            ],
            'template' => "{input}\n{hint}\n{error}\n" . '<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
        ])->passwordInput([
            'class' => 'form-control',
            'placeholder' => $model->attributeLabels()['password'],
        ])
        ?>
        <?=
        $form->field($model, 'confirm_password', [
            'options' => [
                'class' => 'form-group has-feedback',
            ],
            'template' => "{input}\n{hint}\n{error}\n" . '<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
        ])->passwordInput([
            'class' => 'form-control',
            'placeholder' => $model->attributeLabels()['confirm_password'],
        ])
        ?>
        <?=
        $form->field($model, 'phone', [
            'options' => [
                'class' => 'form-group has-feedback',
            ],
            'template' => "{input}\n{hint}\n{error}\n" . '<span class="glyphicon glyphicon-phone form-control-feedback"></span>',
        ])->textInput([
            'class' => 'form-control',
            'placeholder' => $model->attributeLabels()['phone'],
        ])
        ?>
        <?=
        $form->field($model, 'email', [
            'options' => [
                'class' => 'form-group has-feedback',
            ],
            'template' => "{input}\n{hint}\n{error}\n" . '<span class="glyphicon glyphicon-envelope form-control-feedback"></span>',
        ])->textInput([
            'class' => 'form-control',
            'placeholder' => $model->attributeLabels()['email'],
        ])
        ?>
        <?=
        $form->field($model, 'verifyCode', [
            'options' => [
                'class' => 'form-group',
            ],
            'template' => "{input}\n{hint}\n{error}\n",
        ])->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-xs-6">{image}</div><div class="col-xs-6">{input}</div></div>',
            'captchaAction' => '/user/register/captcha',
        ])
        ?>
        <div class="row">
            <div class="col-xs-8">    
                <div class="checkbox icheck">
                    <label>
                        <?=
                        $form->field($model, 'agree', [
                            'template' => "{input} " . Yii::t('reg', 'I agree to the {link}', ['link' => '<a href="#">' . Yii::t('reg', 'terms of user') . '</a>']) . "\n{hint}\n{error}",
                        ])->checkbox([
                            'style' => "background: rgb(255, 255, 255); margin: 0px; padding: 0px; border: 0px currentColor; border-image: none; left: -20%; top: -20%; width: 140%; height: 140%; display: block; position: absolute; opacity: 0;",
                            ], false)
                        ?>
                    </label>
                </div>                        
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-block btn-flat', 'style' => 'margin-top: 6px;']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
        <a class="text-center" href="<?= $ssoUrlManager->createAbsoluteUrl('sso/login'); ?>"><?= 'I already have a membership' ?></a>
    </div>
</div>
<?php if (isset($error) && !empty($error)): ?>
    <?php
    Modal::begin([
        'id' => 'modal-registration-notice',
        'header' => '<h4>' . 'Notice' . '</h4>',
        'options' => [
            'aria-hidden' => 'true',
        ]
    ]);
    ?>
    <?= YII_ENV_PROD ? 'We are sorry to inform you that the registration process error(s) occured, we have recorded for errors and resolve as soon as possible, please understand.' : $error ?>
    <?php Modal::end(); ?>
<?php endif; ?>

