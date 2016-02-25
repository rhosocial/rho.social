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

/**
 * Description of JqueryNiceScrollAsset
 *
 * @author vistart <i@vistart.name>
 */
class JqueryNiceScrollAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@bower/jquery.nicescroll";
    public $js = [
        'jQuery.niceScroll' => 'jquery.nicescroll.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
