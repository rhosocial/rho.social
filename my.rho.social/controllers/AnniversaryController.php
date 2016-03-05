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

use common\models\user\contact\Anniversary;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class AnniversaryController extends DefaultController
{
    use ContactTrait;

    const SESSKEY_MY_ANNIVERSARY = 'sesskey_my_anniversary';

    public $layout = 'anniversary/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(Anniversary::className())]);
    }

    public function actionNew()
    {
        $result = static::insertItem(Anniversary::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ANNIVERSARY, $result);
        return $this->redirect(['anniversary/index']);
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, Anniversary::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ANNIVERSARY, $result);
        return $this->redirect(['anniversary/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, Anniversary::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ANNIVERSARY, $result);
        return $this->redirect(['anniversary/index']);
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_ANNIVERSARY);
    }
}
