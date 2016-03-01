<?php

use common\assets\JqueryNiceScrollAsset;
use common\widgets\LoaderWidget;

JqueryNiceScrollAsset::register($this);
?>
<div class="btn-group">
    <a href="#" id="icon-notifications" data-toggle="dropdown">
        <i class="fa fa-envelope"></i>
    </a>
    <span id="badge-notifications" style="display:none;" class="label label-danger label-notifications">1</span>

    <!-- container for ajax response -->
    <ul id="dropdown-notifications" class="dropdown-menu">
        <li class="dropdown-header">
            <div class="arrow"></div><?php echo Yii::t('common', 'Notifications'); ?>
            <div class="dropdown-header-link"><a id="mark-seen-link"
                                                 href="javascript:markNotificationsAsSeen();"><?php echo Yii::t('common', 'Mark all as seen'); ?></a>
            </div>
        </li>
        <ul class="media-list">
        </ul>
        <li id="loader_notifications">
            <?php echo LoaderWidget::widget(); ?>
        </li>
    </ul>
</div>