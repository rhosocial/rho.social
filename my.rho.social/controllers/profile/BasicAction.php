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
use common\models\user\profile\Profile;
use rho_my\controllers\ProfileController;

/**
 * Description of IndexAction
 *
 * @author vistart <i@vistart.name>
 */
class BasicAction extends Action
{

    public static function setFlashSucceeded()
    {
        ProfileController::setFlashSucceeded(ProfileController::SESSKEY_MY_PROFILE_BASIC);
    }

    public static function setFlashFailed()
    {
        ProfileController::setFlashFailed(ProfileController::SESSKEY_MY_PROFILE_BASIC);
    }

    public static function getFlash()
    {
        return ProfileController::getFlashNotifification(ProfileController::SESSKEY_MY_PROFILE_BASIC);
    }

    public function run()
    {
        $profile = Yii::$app->user->identity->profile;
        $profile->scenario = Profile::SCENARIO_FORM;
        if ($profile->load(Yii::$app->request->post())) {
            if ($profile->save()) {
                static::setFlashSucceeded();
                return $this->controller->redirect([$this->controller->id . '/' . $this->id]);
            }
            static::setFlashFailed();
        }
        return $this->controller->render($this->id . '/index', ['profile' => $profile]);
    }
}
