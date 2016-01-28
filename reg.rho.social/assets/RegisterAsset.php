<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace rho_reg\assets;

use yii\web\AssetBundle;

/**
 * Description of UserRegisterAsset
 *
 * @author vistart <i@vistart.name>
 */
class RegisterAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'register' => 'css/user/register.css?',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rho\assets\AppAsset',
        'common\assets\QueryObjectAsset',
    ];

    public function init()
    {
        //$this->js['hometown'] .= "v=" . time();
    }
}
