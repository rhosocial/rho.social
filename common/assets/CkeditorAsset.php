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
 * Description of CkeditorAsset
 *
 * @author vistart <i@vistart.name>
 */
class CkeditorAsset extends AssetBundle
{
    public $sourcePath = "@bower/ckeditor";
    public $js = [
        'ckeditor.js',
        'config.js',
        'styles.js'
    ];
    public $css = [
        'contents.css',
    ];
}
