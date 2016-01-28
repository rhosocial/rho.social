<?php

use rho_admin\assets\AdminLteAsset;
use common\assets\IcheckAsset;
use common\assets\FontAwesomeAsset;
use yii\helpers\Html;
use vistart\Widgets\CnzzWidget;

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */
AdminLteAsset::register($this);
IcheckAsset::register($this);
FontAwesomeAsset::register($this);
?>
<?php
$cnzzCode = <<<EOT
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255444435'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1255444435' type='text/javascript'%3E%3C/script%3E"));</script>
EOT;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title . ' | ' . Yii::$app->params['title']['main']) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="register-page">
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?=
        CnzzWidget::widget([
            'cnzzCode' => $cnzzCode,
            'host' => \Yii::$app->params['host'],
        ])
        ?>
        <?php $this->endBody() ?>
        <script type="text/javascript">
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
