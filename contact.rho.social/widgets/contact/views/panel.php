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
use rho_contact\widgets\contact\PanelGroupWidget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\View;
use rho_contact\widgets\contact\assets\PanelAsset;

$btnNext = "contact-panel-list-next";
$btnPrev = "contact-panel-list-prev";
$btnRefresh = "contact-panel-list-refresh";
$divPagination = "contact-panel-pagination";
$divList = "contact-panel-list";
$divLoader = "contact-panel-loader";
$txtCurrentPage = "contact-panel-text-current-page";
$txtTotalPage = "contact-panel-text-total-page";
$loaderAnimation = str_replace('"', '\\"', LoaderWidget::widget(['id' => $divLoader]));
PanelAsset::register($this);

/* @var $models \common\models\user\relation\Follow[] */
/* @var $groups \common\models\user\relation\FollowGroup[] */
?>
<?php
$pcu = Url::toRoute($getPageCountUrl);
$iu = Url::toRoute($getItemWidgetsUrl);
$js = <<<EOT
 $(document).ready(function() {
    rho.contact.panel.pageCountUrl = "$pcu";
    rho.contact.panel.itemWidgetsUrl = "$iu";
    rho.contact.panel.btnNext = "$btnNext";
    rho.contact.panel.btnPrev = "$btnPrev";
    rho.contact.panel.btnRefresh = "$btnRefresh";
    rho.contact.panel.divPagination = "$divPagination";
    rho.contact.panel.divList = "$divList";
    rho.contact.panel.divLoader = "$divLoader";
    rho.contact.panel.txtCurrentPage = "$txtCurrentPage";
    rho.contact.panel.txtTotalPage = "$txtTotalPage";
    rho.contact.panel.Loader = "$loaderAnimation";
    rho.contact.panel.currentPage = 0;
    rho.contact.panel.pageSize = 10;
    rho.contact.panel.refresh();
});
EOT;
$this->registerJs($js, View::POS_END);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span style="font-weight: bold; font-size: 16px;"> Contacts</span> All
        <div class="pull-right">
            <?=
            ButtonDropdown::widget([
                'label' => 'Action',
                'dropdown' => [
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Contact', 'url' => '#', 'options' => ['onclick' => "javascript:$('#contact_1').html('Hello, world.').show(1000)", 'data-target' => '#globalModal', 'data-toggle' => 'modal']],
                        '<li role="presentation" class="divider"></li>',
                        ['label' => '<span class="glyphicon glyphicon-refresh"></span> Refresh', 'url' => '#', 'options' => ['id' => $btnRefresh]],
                    ],
                    'encodeLabels' => false,
                ],
            ])
            ?>
            <?= PanelGroupWidget::widget(['groups' => $groups]) ?>
        </div>
    </div>
    <hr>
    <div style="height: 700px;overflow: auto;">
        <ul id="inbox" class="media-list">
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
                <?= $loaderAnimation ?>
            </div>
        </ul>
    </div>
</div>