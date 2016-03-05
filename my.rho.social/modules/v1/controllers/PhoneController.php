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

use common\models\user\contact\Phone;
use Yii;

/**
 * Description of PhoneController
 *
 * @author vistart <i@vistart.name>
 */
class PhoneController extends DefaultController
{

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        return static::getModel($id, Phone::className(), false);
    }

    public function actionPageCount()
    {
        return static::getPageCount(Phone::className());
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        return static::getList(Phone::className());
    }

    public static function getRouteList()
    {
        return '/api/phone/widget-list';
    }

    public static function getRoutePageCount()
    {
        return '/api/phone/page-count';
    }

    public static function getRouteNew()
    {
        return '/phone/new';
    }

    public static function getRouteUpdate()
    {
        return '/phone/update';
    }

    public static function getRouteDelete()
    {
        return '/phone/delete';
    }
}
