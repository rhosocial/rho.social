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
use rho_my\widgets\item\assets\ItemAsset;
use yii\helpers\Url;
use yii\web\View;

$btnNext = "profile-list-next";
$btnPrev = "profile-list-prev";
$btnRefresh = "profile-list-refresh";
$divPagination = "profile-list-pagination";
$divList = "profile-list";
$divLoader = "profile-list-loader";
$txtCurrentPage = "profile-list-current-page";
$txtTotalPage = "profile-list-total-page";
$loaderAnimation = str_replace('"', '\\"', LoaderWidget::widget(['id' => $divLoader]));

$pcu = Url::toRoute($getCountUrl);
$iu = Url::toRoute($getItemUrl);
$js = <<<EOT
 $(document).ready(function() {
    rho.my.item.pageCountUrl = "$pcu";
    rho.my.item.itemWidgetsUrl = "$iu";
    rho.my.item.btnNext = "$btnNext";
    rho.my.item.btnPrev = "$btnPrev";
    rho.my.item.btnRefresh = "$btnRefresh";
    rho.my.item.divPagination = "$divPagination";
    rho.my.item.divList = "$divList";
    rho.my.item.divLoader = "$divLoader";
    rho.my.item.txtCurrentPage = "$txtCurrentPage";
    rho.my.item.txtTotalPage = "$txtTotalPage";
    rho.my.item.Loader = "$loaderAnimation";
    rho.my.item.currentPage = 0;
    rho.my.item.pageSize = 10;
    rho.my.item.refresh();
});
EOT;
$this->registerJs($js, View::POS_END);
ItemAsset::register($this);
?>
<nav id="<?= $divPagination ?>" class="hidden">
    <ul class="pager">
        <li id="<?= $btnPrev ?>"><a id="<?= $btnPrev ?>-a" href="#"><span class="glyphicon glyphicon-arrow-left"></span><span class="hidden-xs"> Prev</span></a></li>
        <li>
            <span id="<?= $txtCurrentPage ?>">1</span> / <span id="<?= $txtTotalPage ?>">3</span>
        </li>
        <li id="<?= $btnNext ?>"><a id="<?= $btnNext ?>-a" href="#"><span class="hidden-xs">Next </span><span class="glyphicon glyphicon-arrow-right"></span></a></li>
    </ul>
</nav>
<div id="<?= $divList ?>">
    <?= LoaderWidget::widget(['id' => $divLoader]) ?>
</div>