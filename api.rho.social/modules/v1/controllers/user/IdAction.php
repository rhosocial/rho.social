<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace rho_api\modules\v1\controllers\user;

use Yii;
use yii\rest\Action;
use rho_api\modules\v1\controllers\UserController;
use rho_api\models\VUserExternalInfo;

/**
 * Description of GetUserInfoAction
 *
 * @author vistart <i@vistart.name>
 */
class IdAction extends Action
{

    public function init()
    {
        $this->modelClass = VUserExternalInfo::className();
        $this->findModel = UserController::className() . '::' . UserController::METHOD_FIND_MODEL;
        $this->checkAccess = UserController::className() . '::' . UserController::METHOD_CHECK_ACCESS;
        parent::init();
    }

    public function run()
    {
        return call_user_func($this->findModel, Yii::$app->request->post('client_id'), Yii::$app->request->post('access_token'));
    }
}
