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

namespace rho_my\controllers;

use common\models\user\contact\Email;
use common\models\user\User;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class EmailController extends DefaultController
{
    use ContactTrait;

    const SESSKEY_MY_EMAIL = 'sesskey_my_email';

    public $layout = 'email/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(Email::className())]);
    }

    public function actionNew()
    {
        if (Yii::$app->request->isAjax) {
            return $this->actionValidate();
        }
        $user = Yii::$app->user->identity;
        /* @var $user User */
        $model = $user->createEmail('');
        /* @var $model Email */
        $model->scenario = Email::SCENARIO_FORM;
        $result = ($model->load(Yii::$app->request->post()) && $model->save());
        $content = '';
        if ($model->hasErrors()) {
            foreach ($model->getFirstErrors() as $key => $error) {
                $content = $error;
                break;
            }
        }
        static::setFlashNotificationByResult(static::SESSKEY_MY_EMAIL, $result);
        return $this->redirect(['email/index']);
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->actionValidate($id);
        }
        $result = static::update($id, Email::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_EMAIL, $result);
        return $this->redirect(['email/index']);
    }

    public function actionDelete($id)
    {
        $result = static::delete($id, Email::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_EMAIL, $result);
        return $this->redirect(['email/index']);
    }

    public function actionValidate($id = '')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!Yii::$app->request->isAjax) {
            return false;
        }
        $model = null;
        if (empty($id)) {
            $model = static::getIdentityNewModel(Email::className());
        } else {
            $model = Email::findByIdentity()->id($id)->one();
        }
        if (!$model) {
            return false;
        }
        /* @var $model Email */
        $model->scenario = Email::SCENARIO_FORM;
        if ($model->load(Yii::$app->request->post())) {
            return ActiveForm::validate($model);
        }
        return false;
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_EMAIL);
    }
}
