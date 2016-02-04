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

namespace rho_contact\controllers;

use common\models\user\relation\Follow;
use rho_contact\widgets\contact\PanelItemWidget;
use Yii;
use yii\base\NotSupportedException;
use yii\data\Pagination;
use yii\helpers\Json;

/**
 * Description of ViewTrait
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
    public static function getModels($current_page = 'all', $page_size = 10)
    {
        if ($current_page == 'all') {
            return Follow::findByIdentity()->all();
        }
        if (!is_numeric($current_page) || $current_page < 0) {
            $current_page = 0;
        }
        $current_page = (int) $current_page;
        if (!is_numeric($page_size) || $page_size < 1) {
            $page_size = 1;
        }
        $page_size = (int) $page_size;
        return Follow::findByIdentity()->limit($page_size)->offset($current_page * $page_size)->all();
    }

    /**
     * get model.
     * @param type $id
     * @param type $modelClass
     * @param type $throwException
     * @return type
     * @throws \yii\web\NotFoundHttpException
     */
    public static function getModel($id, $throwException = true)
    {
        $query = Follow::findByIdentity();
        if (!empty($id)) {
            $query = $query->id($id);
        }
        $model = $query->one();
        if (!$model && $throwException) {
            throw new \yii\web\NotFoundHttpException('Model Not Found.');
        }
        return $model;
    }

    public static function getModelWidget($id)
    {
        $model = static::getModel($id, false);
        if (!$model) {
            return false;
        }
        return PanelItemWidget::widget(['model' => $model]);
    }

    public static function getModelWidgets($current_page = 'all', $page_size = 10)
    {
        $models = static::getModels($current_page, $page_size);
        $widgets = '';
        foreach ($models as $model) {
            $widgets .= PanelItemWidget::widget(['model' => $model]);
        }
        return $widgets;
    }

    public static function countModel()
    {
        return Follow::findByIdentity()->count();
    }

    public static $defaultPageSize = 10;

    public static function getItemCountJson($limit)
    {
        $pages = static::getItemPagination($limit);
        return Json::encode(['totalCount' => $pages->totalCount, 'totalPages' => $pages->pageCount, 'pageSize' => $pages->pageSize]);
    }

    public static function getItemPagination($limit)
    {
        if (!$limit || !is_numeric($limit) || intval($limit) < 0) {
            $limit = static::$defaultPageSize;
        }
        $count = static::countModel();
        if ($limit > $count) {
            $limit = $count;
        }
        return new Pagination(['totalCount' => $count, 'pageSize' => $limit]);
    }

    public static function getCountJson()
    {
        $limit = Yii::$app->request->post('limit');
        if (!$limit || !is_numeric($limit) || intval($limit) < 0) {
            return '';
        }
        $limit = intval($limit);
        if ($limit) {
            $result = static::getItemCountJson($limit);
            if (!$result) {
                return '';
            }
            return $result;
        }
        return 0;
    }

    public static function getItem()
    {
        $page = Yii::$app->request->post('page');
        $limit = Yii::$app->request->post('limit');
        if (!$limit || !is_numeric($limit) || intval($limit) < 0) {
            return '';
        }
        $limit = intval($limit);
        if ($limit && is_numeric($page)) {
            return static::getModelWidgets($page, $limit);
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
