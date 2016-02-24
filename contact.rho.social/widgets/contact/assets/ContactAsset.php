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

namespace rho_contact\widgets\contact\assets;

/**
 * Description of ContactAsset
 *
 * @author vistart <i@vistart.name>
 */
class ContactAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@rho_contact/widgets/contact/assets/contact';
    public $js = [
        'rho.contact.panel' => 'js/rho.contact.contact.js',
    ];
    public $depends = [
        'rho_contact\widgets\contact\assets\PanelAsset',
    ];

}
