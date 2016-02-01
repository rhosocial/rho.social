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

use rho_my\widgets\item\ItemWidget;
use Yii;
use yii\base\NotSupportedException;
use yii\data\Pagination;
use yii\helpers\Json;

/**
 * Description of FrontendTrait
 *
 * @author vistart <i@vistart.name>
 */
trait ViewTrait
{

    /**
     * Get all models.
     * @param type $modelClass
     * @param type $current_page
     * @param type $page_size
     * @return type
     */
    public static function getModels($modelClass, $current_page = 'all', $page_size = 10)
    {
        $identity = Yii::$app->user->identity;
        if ($current_page == 'all') {
            return $modelClass::find()->createdBy($identity->guid)->all();
        }
        if (!is_numeric($current_page) || $current_page < 0) {
            $current_page = 0;
        }
        $current_page = (int) $current_page;
        if (!is_numeric($page_size) || $page_size < 1) {
            $page_size = 1;
        }
        $page_size = (int) $page_size;
        return $modelClass::find()->createdBy($identity->guid)->limit($page_size)->offset($current_page * $page_size)->all();
    }

    /**
     * get model.
     * @param type $id
     * @param type $modelClass
     * @param type $throwException
     * @return type
     * @throws \yii\web\NotFoundHttpException
     */
    public static function getModel($id, $modelClass, $throwException = true)
    {
        $query = $modelClass::find()->byIdentity();
        if (!empty($id)) {
            $query = $query->id($id);
        }
        $model = $query->one();
        if (!$model && $throwException) {
            throw new \yii\web\NotFoundHttpException('Model Not Found.');
        }
        return $model;
    }

    public static function getModelWidget($id, $modelClass)
    {
        $model = static::getModel($id, $modelClass, false);
        if (!$model) {
            return false;
        }
        return ItemWidget::widget(['model' => $model, 'action' => static::getRouteUpdate()]);
    }

    public static function getModelWidgets($modelClass, $current_page = 'all', $page_size = 10)
    {
        $models = static::getModels($modelClass, $current_page, $page_size);
        $widgets = '';
        foreach ($models as $model) {
            $widgets .= ItemWidget::widget(['model' => $model, 'action' => static::getRouteUpdate()]);
        }
        return $widgets;
    }

    public static function identityQuery($modelClass)
    {
        return $modelClass::find()->byIdentity();
    }

    public static function countModel($modelClass)
    {
        return static::identityQuery($modelClass)->count();
    }

    public static $defaultPageSize = 10;

    public static function getItemCountJson($modelClass, $limit)
    {
        $pages = static::getItemPagination($modelClass, $limit);
        return Json::encode(['totalCount' => $pages->totalCount, 'totalPages' => $pages->pageCount, 'pageSize' => $pages->pageSize]);
    }

    public static function getItemPagination($modelClass, $limit)
    {
        if (!$limit || !is_numeric($limit) || intval($limit) < 0) {
            $limit = static::$defaultPageSize;
        }
        $count = static::countModel($modelClass);
        if ($limit > $count) {
            $limit = $count;
        }
        return new Pagination(['totalCount' => $count, 'pageSize' => $limit]);
    }

    public static function getCountJson($modelClass)
    {
        $limit = Yii::$app->request->post('limit');
        if (!$limit || !is_numeric($limit) || intval($limit) < 0) {
            return '';
        }
        $limit = intval($limit);
        if ($limit) {
            $result = static::getItemCountJson($modelClass, $limit);
            if (!$result) {
                return '';
            }
            return $result;
        }
        return 0;
    }

    public static function getItem($modelClass)
    {
        $page = Yii::$app->request->post('page');
        $limit = Yii::$app->request->post('limit');
        if (!$limit || !is_numeric($limit) || intval($limit) < 0) {
            return '';
        }
        $limit = intval($limit);
        if ($limit && is_numeric($page)) {
            return static::getModelWidgets($modelClass, $page, $limit);
        }
        return '';
    }

    public static function getRouteGet()
    {
        throw new NotSupportedException('Model cannot return by AJAX.');
    }

    public static function getRouteGets()
    {
        throw new NotSupportedException('Model cannot return by AJAX.');
    }
}
