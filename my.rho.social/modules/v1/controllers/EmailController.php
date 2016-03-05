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

use common\models\user\contact\Email;
use Yii;

/**
 * Description of EmailController
 *
 * @author vistart <i@vistart.name>
 */
class EmailController extends DefaultController
{

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        return static::getModel($id, Email::className(), false);
    }

    public function actionPageCount()
    {
        return static::getPageCount(Email::className());
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        return static::getList(Email::className());
    }

    public static function getRouteList()
    {
        return '/api/email/widget-list';
    }

    public static function getRoutePageCount()
    {
        return '/api/email/page-count';
    }

    public static function getRouteNew()
    {
        return '/email/new';
    }

    public static function getRouteUpdate()
    {
        return '/email/update';
    }

    public static function getRouteDelete()
    {
        return '/email/delete';
    }
}
