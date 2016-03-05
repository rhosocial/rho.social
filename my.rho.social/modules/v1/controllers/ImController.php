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

use common\models\user\contact\IM;
use Yii;

/**
 * Description of ImController
 *
 * @author vistart <i@vistart.name>
 */
class ImController extends DefaultController
{

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        return static::getModel($id, IM::className(), false);
    }

    public function actionPageCount()
    {
        return static::getPageCount(IM::className());
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        return static::getList(IM::className());
    }

    public static function getRouteList()
    {
        return '/api/im/widget-list';
    }

    public static function getRoutePageCount()
    {
        return '/api/im/page-count';
    }

    public static function getRouteNew()
    {
        return '/im/new';
    }

    public static function getRouteUpdate()
    {
        return '/im/update';
    }

    public static function getRouteDelete()
    {
        return '/im/delete';
    }
}
