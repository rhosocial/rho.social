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
 * Description of MorrisAsset
 *
 * @author vistart <i@vistart.name>
 */
class MorrisAsset extends AssetBundle
{
    public $sourcePath = "@bower/morrisjs";
    public $js = [
        'morris.js',
    ];
    public $css = [
        'morris.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'common\assets\RaphaelAsset',
        'common\assets\MochaAsset',
    ];
}
