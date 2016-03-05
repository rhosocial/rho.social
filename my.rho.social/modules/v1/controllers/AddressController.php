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

use common\models\user\contact\Address;
use rho_my\widgets\item\AddressItemWidget;
use Yii;

/**
 * Description of AddressController
 *
 * @author vistart <i@vistart.name>
 */
class AddressController extends DefaultController
{

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        return static::getModel($id, Address::className(), false);
    }

    public function actionPageCount()
    {
        return static::getPageCount(Address::className());
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        return static::getList(Address::className());
    }

    public function actionWidgetGet()
    {
        $model = static::actionGet();
        if (!$model) {
            return false;
        }
        return AddressItemWidget::widget(['model' => $model, 'action' => static::getRouteUpdate(), 'delete' => static::getRouteDelete()]);
    }

    public function actionWidgetList()
    {
        $items = $this->actionList();
        $widgets = "";
        foreach ($items as $item) {
            $widgets .= AddressItemWidget::widget(['model' => $item, 'action' => static::getRouteUpdate(), 'delete' => static::getRouteDelete()]);
        }
        return $widgets;
    }

    public static function getRouteList()
    {
        return '/api/address/widget-list';
    }

    public static function getRoutePageCount()
    {
        return '/api/address/page-count';
    }

    public static function getRouteNew()
    {
        return '/address/new';
    }

    public static function getRouteUpdate()
    {
        return '/address/update';
    }

    public static function getRouteDelete()
    {
        return '/address/delete';
    }
}
