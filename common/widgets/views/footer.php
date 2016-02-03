<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */
use vistart\Widgets\CnzzWidget;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $powered array */
?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; vistart <?= date('Y') == '2015' ? '2015' : '2015 - ' . date('Y') ?></p>
        <p class="pull-right">
            <a href="http://www.miitbeian.gov.cn" target="_blank" rel="external"><?= '沪ICP备14009001号-2' ?></a>
        <?= 'Powered by ' . Html::a($powered['label'], $powered['link'], ['rel' => 'external']) ?>
        </p>
        <?=
        CnzzWidget::widget([
            'cnzzCode' => $cnzzCode,
            'host' => \Yii::$app->params['baseDomain'],
        ])
        ?>
    </div>
</footer>