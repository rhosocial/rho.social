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
 * Description of MochaAsset
 *
 * @author vistart
 */
class MochaAsset extends AssetBundle
{
    public $sourcePath = "@bower/mocha";
    public $js = [
        'mocha.js',
    ];
    public $css = [
        'mocha.css',
    ];
}
