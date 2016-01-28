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

namespace rho_sso\controllers\sso;

use rho_sso\models\LoginForm;
use Yii;
use yii\base\Action;

/**
 * 负责登录。
 *
 * @author vistart <i@vistart.name>
 */
class LoginAction extends Action {

    public function run() {
        $mdManager = Yii::$app->multipleDomainsManager;
        $homeUrlManager = $mdManager->get('');
        Yii::$app->setHomeUrl($homeUrlManager->createAbsoluteUrl(['site/index']));
        if (!Yii::$app->user->isGuest) {
            return $this->controller->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->controller->goBack(Yii::$app->homeUrl);
        }
        $this->controller->layout = 'login';
        return $this->controller->render('login', [
                    'model' => $model, 'homeUrl' => Yii::$app->homeUrl,
        ]);
    }

}
