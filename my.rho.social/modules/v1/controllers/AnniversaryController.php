<?php

/* *
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace rho_my\modules\v1\controllers;

use common\models\user\contact\Anniversary;
use Yii;

/**
 * Description of AnniversaryController
 *
 * @author vistart <i@vistart.name>
 */
class AnniversaryController extends DefaultController
{

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        return static::getModel($id, Anniversary::className(), false);
    }

    public function actionPageCount()
    {
        return static::getPageCount(Anniversary::className());
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        return static::getList(Anniversary::className());
    }

    public static function getRouteList()
    {
        return '/api/anniversary/widget-list';
    }

    public static function getRoutePageCount()
    {
        return '/api/anniversary/page-count';
    }

    public static function getRouteNew()
    {
        return '/anniversary/new';
    }

    public static function getRouteUpdate()
    {
        return '/anniversary/update';
    }

    public static function getRouteDelete()
    {
        return '/anniversary/delete';
    }
}
