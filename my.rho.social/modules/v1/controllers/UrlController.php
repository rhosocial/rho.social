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

use common\models\user\contact\URL;
use Yii;

/**
 * Description of UrlController
 *
 * @author vistart <i@vistart.name>
 */
class UrlController extends DefaultController
{

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        return static::getModel($id, URL::className(), false);
    }

    public function actionPageCount()
    {
        return static::getPageCount(URL::className());
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        return static::getList(URL::className());
    }

    public static function getRouteList()
    {
        return '/api/url/widget-list';
    }

    public static function getRoutePageCount()
    {
        return '/api/url/page-count';
    }

    public static function getRouteNew()
    {
        return '/url/new';
    }

    public static function getRouteUpdate()
    {
        return '/url/update';
    }

    public static function getRouteDelete()
    {
        return '/url/delete';
    }
}
