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
use common\models\user\contact\Anniversary;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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

    public function actionGets($list = 0)
    {
        if ($list) {
            return static::getCountJson(Anniversary::className());
        }
        return static::getItem(Anniversary::className());
    }

    public function actionGet($id)
    {
        return static::getModelWidget($id, Anniversary::className());
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_ANNIVERSARY);
    }

    public static function getRouteGet()
    {
        return 'anniversary/get';
    }

    public static function getRouteGets()
    {
        return 'anniversary/gets';
    }

    public static function getRouteNew()
    {
        return 'anniversary/new';
    }

    public static function getRouteUpdate()
    {
        return 'anniversary/update';
    }

    public static function getRouteDelete()
    {
        return 'anniversary/delete';
    }
}
