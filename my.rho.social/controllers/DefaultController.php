<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace rho_my\controllers;

use Yii;
use common\models\user\BaseUserItem;
use yii\base\NotSupportedException;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
class DefaultController extends \yii\web\Controller
{

    const MESSAGE_UPDATE_SUCCEEDED = [
        'alert_class' => 'alert-success',
        'title' => 'Congrats!',
        'content' => 'Update succeeded!',
    ];
    const MESSAGE_UPDATE_FAILED = [
        'alert_class' => 'alert-danger',
        'title' => 'Sorry!',
        'content' => 'Some errors occured.',
    ];

    public static function setFlashSucceeded($key)
    {
        static::setFlashNotification($key, self::MESSAGE_UPDATE_SUCCEEDED);
    }

    public static function setFlashFailed($key)
    {
        static::setFlashNotification($key, self::MESSAGE_UPDATE_FAILED);
    }

    public static function setFlashNotification($key, $value)
    {
        Yii::$app->session->setFlash($key, $value);
    }

    public static function getFlashNotifification($key)
    {
        return Yii::$app->session->getFlash($key);
    }

    public static function insertItem($id, $modelClass)
    {
        $model = new $modelClass(['scenario' => BaseUserItem::SCENARIO_FORM]);
        return ($model->load(Yii::$app->request->post()) && $model->save());
    }

    public static function updateItem($id, $modelClass)
    {
        try {
            $model = static::getModel($id, $modelClass);
        } catch (\yii\web\NotFoundHttpException $ex) {
            return false;
        }
        $model->scenario = BaseUserItem::SCENARIO_FORM;
        return ($model->load(Yii::$app->request->post()) && $model->save());
    }

    public static function deleteItem($id, $modelClass)
    {
        try {
            $model = static::getModel($id, $modelClass);
        } catch (\yii\web\NotFoundHttpException $ex) {
            return false;
        }
        return $model->delete();
    }

    public static function itemExists($content, $modelClass)
    {
        $identity = Yii::$app->user->identity;
        return $modelClass::find()->createdBy($identity->guid)->content($content)->exists();
    }

    private static function getModels($modelClass)
    {
        $identity = Yii::$app->user->identity;
        return $modelClass::find()->createdBy($identity->guid)->all();
    }

    private static function getModel($id, $modelClass, $throwException = true)
    {
        $identity = Yii::$app->user->identity;
        $query = $modelClass::find()->createdBy($identity->guid);
        if (!empty($id)) {
            $query = $query->id($id);
        }
        $model = $query->one();
        if (!$model && $throwException) {
            throw new \yii\web\NotFoundHttpException('Model Not Found.');
        }
        return $model;
    }

    public static function getRouteNew()
    {
        throw new NotSupportedException('New model cannot be created.');
    }

    public static function getRouteUpdate()
    {
        throw new NotSupportedException('Model cannot be updated.');
    }

    public static function getRouteDelete()
    {
        throw new NotSupportedException('Model cannot be deleted.');
    }
}
