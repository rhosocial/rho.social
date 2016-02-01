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

namespace rho_reg\controllers\register;

use Yii;
use yii\base\Action;
use yii\db\Exception;
use yii\helpers\Url;
use rho_reg\controllers\RegisterController;
use rho_reg\models\RegisterForm;

/**
 * Description of IndexAction
 *
 * @author vistart <i@vistart.name>
 */
class IndexAction extends Action
{

    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            $homeUrlManager = Yii::$app->multipleDomainsManager->get();
            return $this->controller->redirect($homeUrlManager->createAbsoluteUrl(''));
        }
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            try {
                $result = $model->register();
            } catch (Exception $ex) {
                $result = $ex->getMessage();
            }
            if ($result === false) {
                return $this->controller->render('index', ['model' => $model, 'error' => $result]);
            }
            Yii::$app->session->setFlash(RegisterController::SESSKEY_REG_REGISTER_NEW_USER, $result);
            return $this->controller->redirect(Url::toRoute('register/finish'));
        }
        return $this->controller->render('index', ['model' => $model]);
    }
}
