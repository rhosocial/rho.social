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
class Wysihtml5Asset extends AssetBundle
{
    public $sourcePath = "@bower/wysihtml5/dist";
    public $js = [
        'wysihtml5-0.3.0.js',
    ];
}
