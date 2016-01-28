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

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Description of AdminLteAsset
 *
 * @author vistart
 */
class AdminLteAsset extends AssetBundle
{

    public $sourcePath = "@bower/admin-lte/dist";
    public $js = [
        'js/app.js',
    ];
    public $css = [
        'css/AdminLTE.css',
        'css/skins/_all-skins.css',
    ];
    public $depends = [
        //'rho_admin\assets\AppAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
