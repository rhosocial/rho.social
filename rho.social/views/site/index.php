<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\web\View;
use common\widgets\FeatureItemWidget;

$this->title = 'Home';
$this->registerJs('var get_text_url = "' . Url::toRoute('/site/get-text') . '"', View::POS_BEGIN);
$this->registerJs(
    '$("#btn1").click('
    . 'function(){'
    . '$("#text1").load(get_text_url);'
    . '})', View::POS_READY);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to <?= Yii::$app->name ?>!</h1>
        <p class="lead">Convenient and Powerful Personal Information & Relationship Manager.</p>

        <p><button id="btn1" type="button" class="btn btn-lg btn-success">Join Now!</button></p>
        <p id="text1"></p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-md-4">
                <h2>Personal Information</h2>
                <p>Manage your profile, phone, email, address, etc. Record every modification and delivery of them.</p>
                <p><a href="https://my.rho.social/" class="btn btn-primary" type="button">My Profile »</a> <a href="/user/my/learn" class="btn btn-success" type="button">Learn more »</a></p>
            </div>

            <div class="col-md-4">
                <h2>Social Relationship</h2>
                <p>Follow you want, Notify if changed.</p>
                <p><a href="https://contact.rho.social/" class="btn btn-primary" type="button">Find Friends »</a> <a href="https://contact.rho.social/" class="btn btn-success" type="button">Learn more »</a></p>
            </div>

            <div class="col-md-4">
                <h2>Opening to Third-party</h2>
                <p>Delivery your personal information to third-party.</p>
                <p><a href="http://www.yiiframework.com/extensions/" class="btn btn-primary" type="button">Access Your App »</a> <a href="/dev/learn/introduction" class="btn btn-success" type="button">Learn more »</a></p>
            </div>
        </div>

    </div>
</div>
