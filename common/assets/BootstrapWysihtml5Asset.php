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
 * Description of Wysihtml5Asset
 *
 * @author vistart <i@vistart.name>
 */
class BootstrapWysihtml5Asset extends AssetBundle
{
    public $sourcePath = "@bower/bootstrap3-wysihtml5/dist";
    public $js = [
        'bootstrap-wysihtml5-0.0.2.js',
    ];
    public $css = [
        'bootstrap-wysihtml5-0.0.2.css',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\Wysihtml5Asset',
    ];
}