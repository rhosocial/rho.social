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
        $result = static::insertItem(Email::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_EMAIL, $result);
        return $this->redirect(['email/index']);
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, Email::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_EMAIL, $result);
        return $this->redirect(['email/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, Email::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_EMAIL, $result);
        return $this->redirect(['email/index']);
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_EMAIL);
    }
}
