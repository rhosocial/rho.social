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

namespace rho_contact\assets;

/**
 * Description of AppAsset
 *
 * @author vistart <i@vistart.name>
 */
class AppAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@rho_contact/assets/app";
    public $baseUrl = '@web';
    public $js = [
        'rho.contact' => 'js/rho.contact.js',
    ];
    public $depends = [
        'common\assets\CommonAsset',
    ];
}
