<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace rho_contact\widgets\contact\assets;

/**
 * Description of PanelAsset
 *
 * @author vistart <i@vistart.name>
 */
class PanelAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@rho_contact/widgets/contact/assets/panel';
    public $js = [
        //'get-item' => 'js/get-item.js',
        'rho.contact.panel' => 'js/rho.contact.panel.js',
    ];
    public $depends = [
        'rho_contact\assets\AppAsset',
    ];

}
