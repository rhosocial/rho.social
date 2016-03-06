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

use common\models\user\contact\Address;
use common\models\user\User;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class AddressController extends DefaultController
{
    use ContactTrait;

    const SESSKEY_MY_ADDRESS = 'sesskey_my_address';

    public $layout = 'address/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(Address::className())]);
    }

    public function actionNew()
    {
        if (Yii::$app->request->isAjax) {
            return $this->actionValidate();
        }
        $user = Yii::$app->user->identity;
        /* @var $user User */
        $model = $user->createAddress('', '', '', '', '', '', '', '');
        /* @var $model Address */
        $model->scenario = Address::SCENARIO_FORM;
        $result = ($model->load(Yii::$app->request->post()) && $model->save());
        $content = '';
        if ($model->hasErrors()) {
            foreach ($model->getFirstErrors() as $key => $error) {
                $content = $error;
                break;
            }
        }
        static::setFlashNotificationByResult(static::SESSKEY_MY_ADDRESS, $result);
        return $this->redirect(['address/index']);
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->actionValidate($id);
        }
        $result = static::update($id, Address::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ADDRESS, $result);
        return $this->redirect(['address/index']);
    }

    public function actionDelete($id)
    {
        $result = static::delete($id, Address::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ADDRESS, $result);
        return $this->redirect(['address/index']);
    }

    public function actionValidate($id = '')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!Yii::$app->request->isAjax) {
            return false;
        }
        $model = null;
        if (empty($id)) {
            $model = static::getIdentityNewModel(Address::className());
        } else {
            $model = Address::findByIdentity()->id($id)->one();
        }
        if (!$model) {
            return false;
        }
        /* @var $model Address */
        $model->scenario = Address::SCENARIO_FORM;
        if ($model->load(Yii::$app->request->post())) {
            return ActiveForm::validate($model);
        }
        return false;
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_ADDRESS);
    }
}
