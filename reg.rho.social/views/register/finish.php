<?php
/* @var $this yii\web\View */

use rho_reg\assets\RegisterAsset;

$this->title = 'Congratulations!';
RegisterAsset::register($this);
$ssoUrlManager = Yii::$app->multiDomainsManager->get('sso');
?>
<div class="row">
    <div class="jumbotron col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 register-blocks">
        <h2>
            Congratulations!
        </h2>
        <div style="margin-top: 36px;">
            Your <?= Yii::$app->params['title']['main'] ?> No. is:<br/>
            <a class="btn btn-primary" type="button" href="<?= $ssoUrlManager->createAbsoluteUrl(['/site/login', 'id' => $id]) ?>"><?= $id ?></a>
        </div>
    </div><!-- register-finish -->
</div>