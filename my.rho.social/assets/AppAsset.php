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

namespace rho_my\assets;


/**
 * @author vistart <i@vistart.name>
 * @since 2.0
 */
class AppAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@rho_my/assets/app";
    public $baseUrl = '@web';
    public $js = [
        'rho.contact' => 'js/rho.my.js',
    ];
    public $depends = [
        'common\assets\CommonAsset',
    ];

}
