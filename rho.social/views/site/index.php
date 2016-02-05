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
            <?= FeatureItemWidget::widget(['title' => 'Personal Information', 'btnGoto' => ['text' => 'My Profile &raquo;', 'href' => Yii::$app->multiDomainsManager->get('my')->createAbsoluteUrl('')], 'btnLearn' => ['text' => 'Learn more &raquo;', 'href' => Url::toRoute('user/my/learn')]]) ?>

            <?= FeatureItemWidget::widget(['title' => 'Social Relationship', 'btnGoto' => ['text' => 'Find Friends &raquo;', 'href' => Yii::$app->multiDomainsManager->get('contact')->createAbsoluteUrl('')], 'btnLearn' => ['text' => 'Learn more &raquo;', 'href' => Yii::$app->multiDomainsManager->get('contact')->createAbsoluteUrl('')]]) ?>

            <?= FeatureItemWidget::widget(['title' => 'Opening to Third-party', 'btnGoto' => ['text' => 'Access Your App &raquo;', 'href' => "http://www.yiiframework.com/extensions/"], 'btnLearn' => ['text' => 'Learn more &raquo;', 'href' => Url::toRoute('dev/learn/introduction')]]) ?>
        </div>

    </div>
</div>
