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
/**
 * NOTICE!
 * This file is regared as layout template, please DO NOT use it directly.
 */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\assets\CommonAsset;
use common\widgets\Alert;
use common\widgets\TopbarFirst;
use common\widgets\TopbarSecond;
use common\widgets\FooterWidget;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $files string[] */

CommonAsset::register($this);

function loadExternalConfigs($files = [])
{
    foreach ($files as $file) {
        if (is_string($file)) {
            loadAndDefaults($file);
        }
    }
}
loadExternalConfigs($files);
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
        <?= TopbarFirst::widget(['title1' => Yii::$app->user->identity->profile->nickname, 'title2' => Yii::$app->user->id]); ?>
        <?=
        TopbarSecond::widget(
            ['navItems' => (isset($this->params['topbar_second']) ? $this->params['topbar_second'] : []),
                'visible_md' => (isset($this->params['topbar_second_visible_md']) ? $this->params['topbar_second_visible_md'] : true),
                'visible_sm' => (isset($this->params['topbar_second_visible_sm']) ? $this->params['topbar_second_visible_sm'] : true)])
        ?>
        <div class="wrap">
            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
        <?= FooterWidget::widget() ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>