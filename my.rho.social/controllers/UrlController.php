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

use common\models\user\contact\URL;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class UrlController extends DefaultController
{
    use ContactTrait;

    const SESSKEY_MY_URL = 'sesskey_my_url';

    public $layout = 'url/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(URL::className())]);
    }

    public function actionNew()
    {
        $result = static::insertItem(URL::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_URL, $result);
        return $this->redirect(['url/index']);
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, URL::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_URL, $result);
        return $this->redirect(['url/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, URL::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_URL, $result);
        return $this->redirect(['url/index']);
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_URL);
    }
}
