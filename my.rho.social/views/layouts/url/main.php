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
 * 此布局包括为左右分栏设计，具体比例见下方。
 * 面板头部在单独的文件中，而且负责生成添加新模型的模态框和列表。所以需要新建的模型。
 * 因此需要用参数的方法传递动作生成的模型。参数键为'newModel'。
 */
use rho_my\helpers\ViewHelper as vh;

$this->title .= Yii::t('my', 'URL');
?>
<?php $this->beginContent('@rho_my/views/layouts/main.php'); ?>
<?= vh::markBegin('layouts/URL/main') ?>
<div class="row">
    <div class="col-md-9 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= $this->render('_head', ['newModel' => $this->params['newModel']]) ?>
            </div>
            <hr>
            <div class="panel-body">
                <?= $content ?>
            </div>
        </div>
    </div>
    <div class="profile-nav-container col-md-3 col-sm-4">
        <?php //$this->render('_sidebar')     ?>
    </div>
</div>
<?= vh::markEnd('layouts/URL/main') ?>
<?php $this->endContent(); ?>