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

namespace rho_message\modules\notification\widgets\assets;

/**
 * Description of OverviewAsset
 *
 * @author vistart <i@vistart.name>
 */
class OverviewAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@rho_message/modules/notification/widgets/assets/overview';
    
    public $js = [
        'rho.message.notification' => 'js/rho.message.notification.js',
    ];
}
