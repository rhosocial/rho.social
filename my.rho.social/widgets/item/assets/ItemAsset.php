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

namespace rho_my\widgets\item\assets;

/**
 * Description of ItemAsset
 *
 * @author vistart <i@vistart.name>
 */
class ItemAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@rho_my/widgets/item/assets/item';
    public $css = [
        'item' => 'css/item.css',
    ];
    public $js = [
        'get-item' => 'js/get-item.js',
        'rho.my.item' => 'js/rho.my.item.js',
    ];
    public $depends = [
        'rho_my\assets\AppAsset',
    ];

}
