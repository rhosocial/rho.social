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

namespace rho_my\controllers\profile;

use Yii;
use yii\base\Action;

/**
 * Description of IndexAction
 *
 * @author vistart <i@vistart.name>
 */
class IconAction extends Action
{

    public function run()
    {
        $profile = Yii::$app->user->identity->profile;
        return $this->controller->render('icon', ['profile' => $profile]);
    }
}
