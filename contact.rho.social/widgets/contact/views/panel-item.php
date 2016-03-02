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
/* @var $model \common\models\user\relation\Follow */
?>
<li class="entry" type="panel-user-item" user-no="<?= $model->recipient->id ?>">
    <a href="#">
        <div class="media">
            <div class="pull-left" style="margin-right: 6px;">
                <img class="media-object img-rounded" style="width: 40px; height: 40px;" alt="40x40" data-src="holder.js/40x40?theme=social">
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <?= $model->recipient->profile->nickname ?>
                    <small>
                        <span class="time pull-right">
                            <?php
                            $ca = $model->createdAtAttribute;
                            echo $model->$ca
                            ?>
                        </span>
                    </small>
                </h4>
                <h5 id="contact_1"><?= $model->recipient->profile->individual_sign ?>Lorem ipsum dolor sit amet</h5>
            </div>
        </div>
    </a>
</li>
<script type="text/javascript">
    $("[user-no='<?= $model->recipient->id ?>']").click(load_<?= $model->recipient->id ?>);
    function load_<?= $model->recipient->id ?>() {
        <?php
        /**
         * TO DO: Check rate limit.
         */
        ?>
        rho.contact.contact.get(<?= $model->recipient->id ?>);
    }
</script>