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

namespace rho_message\modules\message\widgets;

use Yii;

/**
 * Description of Overview
 *
 * @author vistart <i@vistart.name>
 */
class Overview extends \yii\base\Widget
{

    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
        return $this->render('overview');
    }
}
