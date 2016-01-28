<?php

/*
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
 * Description of FullCalenderAsset
 *
 * @author vistart <i@vistart.name>
 */
class FullCalenderAsset extends AssetBundle
{
    public $sourcePath = "@bower/fullcalendar/dist";
    public $js = [
        'fullcalendar.js'
    ];
    public $css = [
        'fullcalendar.css',
        'fullcalendar.print.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'common\assets\MomentAsset',
    ];
}
