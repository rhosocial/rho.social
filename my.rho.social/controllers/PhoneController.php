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

use Yii;
use common\models\user\contact\Phone;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Description of PhoneController
 *
 * @author vistart <i@vistart.name>
 */
final class PhoneController extends DefaultController
{

    use ContactTrait;
    const SESSKEY_MY_PHONE = 'sesskey_my_phone';

    public $layout = 'phone/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(Phone::className())]);
    }

    public function actionNew()
    {
        $result = static::insertItem(Phone::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_PHONE, $result);
        return $this->redirect(['/phone/index']);
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, Phone::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_PHONE, $result);
        return $this->redirect(['/phone/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, Phone::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_PHONE, $result);
        return $this->redirect(['/phone/index']);
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_PHONE);
    }
}
