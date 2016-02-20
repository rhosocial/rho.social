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
use common\widgets\LoaderWidget;
use yii\helpers\Inflector;
use rho_my\widgets\item\assets\ItemAsset;
use yii\helpers\Url;
use yii\web\View;

$this->registerJs('var get_item_url = "' . Url::toRoute($getItemUrl) . '"', View::POS_BEGIN);
$this->registerJs('var get_count_url = "' . Url::toRoute($getCountUrl) . '"', View::POS_BEGIN);
ItemAsset::register($this);
?>
<nav id="pagination" class="hidden">
    <ul class="pager">
        <li id="li-prev"><a id="btn-prev" href="#"><span class="glyphicon glyphicon-arrow-left"></span><span class="hidden-xs"> Prev</span></a></li>
        <li>
            <span id="page-current">1</span> / <span id="page-total">3</span>
        </li>
        <li id="li-next"><a id="btn-next" href="#"><span class="hidden-xs">Next </span><span class="glyphicon glyphicon-arrow-right"></span></a></li>
    </ul>
</nav>
<div id="item-list">
    <?= LoaderWidget::widget(['id' => Inflector::slug($getItemUrl)]) ?>
</div>