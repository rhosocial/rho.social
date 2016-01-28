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
 * Description of BowerJvectormapAsset
 *
 * @author vistart <i@vistart.name>
 */
class BowerJvectormapAsset extends AssetBundle
{
    public $sourcePath = "@bower/bower-jvectormap";
    public $js = [
        'jquery-jvectormap-1.2.2.min.js',
        'jquery-jvectormap-world-mill-en.js',
    ];
    public $css = [
        'jquery-jvectormap-1.2.2.css',
    ];
}
