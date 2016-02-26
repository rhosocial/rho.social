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

namespace rho_message\assets;

/**
 * Description of AppAsset
 *
 * @author vistart <i@vistart.name>
 */
class AppAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@rho_message/assets/app';
    public $js = [
        'rho.message' => 'js/rho.message.js',
    ];
    public $depends = [
        'common\assets\CommonAsset',
    ];

}
