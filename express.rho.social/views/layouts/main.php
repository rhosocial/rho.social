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
use yii\helpers\Html;
use common\assets\CommonAsset;
use common\widgets\TopbarFirst;
use common\widgets\TopbarSecond;
use common\widgets\FooterWidget;

/* @var $this \yii\web\View */
/* @var $content string */

CommonAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title . ' | ' . Yii::$app->params['title']['main'] . ' ' . Yii::$app->params['title']['express']) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?= TopbarFirst::widget(); ?>
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
