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

use common\models\user\BaseUserItem;
use rho_my\modules\v1\controllers\DefaultController as dc;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Description of CRUDTrait
 *
 * @author vistart <i@vistart.name>
 */
trait CRUDTrait
{

    public static function update($id, $modelClass)
    {
        try {
            $model = dc::getModel($id, $modelClass);
        } catch (NotFoundHttpException $ex) {
            return false;
        }
        $model->scenario = BaseUserItem::SCENARIO_FORM;
        return ($model->load(Yii::$app->request->post()) && $model->save());
    }

    public static function delete($id, $modelClass)
    {
        try {
            $model = dc::getModel($id, $modelClass);
        } catch (NotFoundHttpException $ex) {
            return false;
        }
        return $model->delete();
    }

    public static function exists($content, $modelClass)
    {
        return $modelClass::find()->byIdentity->content($content)->exists();
    }

    public static function getRouteNew()
    {
        
    }

    public static function getRouteUpdate()
    {
        
    }

    public static function getRouteDelete()
    {
        
    }
}
