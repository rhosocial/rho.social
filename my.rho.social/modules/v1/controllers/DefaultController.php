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

namespace rho_my\modules\v1\controllers;

use rho_my\widgets\item\ItemWidget;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
abstract class DefaultController extends \yii\rest\Controller
{

    /**
     * get model.
     * @param type $id
     * @param type $modelClass
     * @param type $throwException
     * @return type
     * @throws NotFoundHttpException
     */
    public static function getModel($id, $modelClass, $throwException = true)
    {
        $query = $modelClass::findByIdentity();
        if (!empty($id)) {
            $query = $query->id($id);
        }
        $model = $query->one();
        if (!$model && $throwException) {
            throw new NotFoundHttpException('Model Not Found.');
        }
        return $model;
    }

    public static function getPageCount($modelClass)
    {
        $pageSize = Yii::$app->request->post('pageSize');
        return $modelClass::getPagination($pageSize)->pageCount;
    }

    public static function getList($modelClass)
    {
        $pageSize = Yii::$app->request->post('pageSize');
        $currentPage = Yii::$app->request->post('currentPage');
        return $modelClass::findAllByIdentityInBatch($pageSize, $currentPage);
    }

    public abstract function actionGet();

    public function actionWidgetGet()
    {
        $model = static::actionGet();
        if (!$model) {
            return false;
        }
        return ItemWidget::widget(['model' => $model, 'action' => static::getRouteUpdate(), 'delete' => static::getRouteDelete()]);
    }

    public abstract function actionPageCount();

    public abstract function actionList();

    public function actionWidgetList()
    {
        $items = $this->actionList();
        $widgets = "";
        foreach ($items as $item) {
            $widgets .= ItemWidget::widget(['model' => $item, 'action' => static::getRouteUpdate(), 'delete' => static::getRouteDelete()]);
        }
        return $widgets;
    }

    public static function getRouteList()
    {
        
    }

    public static function getRoutePageCount()
    {
        
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
