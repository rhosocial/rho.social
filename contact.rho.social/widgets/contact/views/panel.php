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

$this->registerJs('var get_item_url = "' . Url::toRoute($getItemUrl) . '";', View::POS_BEGIN);
$this->registerJs('var getPageCountUrl = "' . Url::toRoute($getPageCountUrl) . '";', View::POS_BEGIN);
$btnNext = "contact-panel-list-next";
$btnPrev = "contact-panel-list-prev";
$btnRefresh = "contact-panel-list-refresh";
$divPagination = "contact-panel-pagination";
$divList = "contact-panel-list";
$divLoader = "contact-panel-loader";
$txtCurrentPage = "contact-panel-text-current-page";
$txtTotalPage = "contact-panel-text-total-page";
$loaderAnimation = str_replace('"', '\\"', LoaderWidget::widget(['id' => $divLoader]));
$this->registerJs('var contactPanelListNext = "' . $btnNext . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelListPrev = "' . $btnPrev . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelListRefresh = "' . $btnRefresh . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelPagination = "' . $divPagination . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelList = "' . $divList . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelLoader = "' . $divLoader . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelTextCurrentPage = "' . $txtCurrentPage . '";', View::POS_BEGIN);
$this->registerJs('var contactPanelTextTotalPage = "' . $txtTotalPage . '";', View::POS_BEGIN);
$this->registerJs('var LoaderAnimation = "' . $loaderAnimation . '";', View::POS_BEGIN);
PanelAsset::register($this);

/* @var $models \common\models\user\relation\Follow[] */
/* @var $groups \common\models\user\relation\FollowGroup[] */
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