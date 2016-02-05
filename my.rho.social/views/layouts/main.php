<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\assets\CommonAsset;
use common\widgets\Alert;
use common\widgets\LogoWidget;
use common\widgets\TopbarSecond;
use common\widgets\AccountTopMenuWidget;
use common\widgets\FooterWidget;

/* @var $this \yii\web\View */
/* @var $content string */

CommonAsset::register($this);
require('topbar-second.php');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title . ' | ' . Yii::$app->params['title']['main']) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="topbar-first" class="topbar">
            <div class="container">
                <div class="topbar-brand hidden-xs">
                    <?= LogoWidget::widget(); ?>
                </div>

                <div class="topbar-actions pull-right">
                    <?= AccountTopMenuWidget::widget(['title1' => Yii::$app->user->id, 'title2' => Yii::$app->user->id]); ?>
                </div>

                <div class="notifications pull-right">

                </div>
            </div>
        </div>
        <?= TopbarSecond::widget(['navItems' => (isset($this->params['topbar_second']) ? $this->params['topbar_second'] : []), 'visible_md' => (isset($this->params['topbar_second_visible_md']) ? $this->params['topbar_second_visible_md'] : true), 'visible_sm' => (isset($this->params['topbar_second_visible_sm']) ? $this->params['topbar_second_visible_sm'] : true)]) ?>
        <div class="wrap">
            <div class="container">
                <?= $content ?>
            </div>
        </div>

        <?= FooterWidget::widget() ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
