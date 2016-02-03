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
use common\models\user\contact\IM;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class IMController extends DefaultController
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

    public function actionGets($list = 0)
    {
        if ($list) {
            return static::getCountJson(IM::className());
        }
        return static::getItem(IM::className());
    }

    public function actionGet($id)
    {
        return static::getModelWidget($id, IM::className());
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_IM);
    }

    public static function getRouteGet()
    {
        return 'im/get';
    }

    public static function getRouteGets()
    {
        return 'im/gets';
    }

    public static function getRouteNew()
    {
        return 'im/new';
    }

    public static function getRouteUpdate()
    {
        return 'im/update';
    }

    public static function getRouteDelete()
    {
        return 'im/delete';
    }
}
