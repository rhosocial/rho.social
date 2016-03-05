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

use common\models\user\contact\IM;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class ImController extends DefaultController
{
    use ContactTrait;

    const SESSKEY_MY_IM = 'sesskey_my_im';

    public $layout = 'im/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(IM::className())]);
    }

    public function actionNew()
    {
        $result = static::insertItem(IM::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_IM, $result);
        return $this->redirect(['im/index']);
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, IM::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_IM, $result);
        return $this->redirect(['im/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, IM::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_IM, $result);
        return $this->redirect(['im/index']);
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_IM);
    }
}
