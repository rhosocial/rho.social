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
use common\models\user\contact\URL;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class URLController extends DefaultController
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

    public function actionGets($list = 0)
    {
        if ($list) {
            return static::getCountJson(URL::className());
        }
        return static::getItem(URL::className());
    }

    public function actionGet($id)
    {
        return static::getModelWidget($id, URL::className());
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_URL);
    }

    public static function getRouteGet()
    {
        return 'url/get';
    }

    public static function getRouteGets()
    {
        return 'url/gets';
    }

    public static function getRouteNew()
    {
        return 'url/new';
    }

    public static function getRouteUpdate()
    {
        return 'url/update';
    }

    public static function getRouteDelete()
    {
        return 'url/delete';
    }
}
