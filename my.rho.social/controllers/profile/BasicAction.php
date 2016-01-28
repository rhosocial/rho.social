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

    public function run()
    {
        $profile = Yii::$app->user->identity->profile;
        $profile->scenario = Profile::SCENARIO_FORM;
        if ($profile->load(Yii::$app->request->post()) && $profile->save()) {
            ProfileController::setFlashNotification(ProfileController::SESSKEY_MY_PROFILE_BASIC, ProfileController::MESSAGE_UPDATE_SUCCESS);
            return $this->controller->redirect([$this->controller->id . '/' . $this->id]);
        }
        return $this->controller->render($this->id, ['profile' => $profile]);
    }
}
