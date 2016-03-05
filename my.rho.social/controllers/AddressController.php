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

namespace rho_my\controllers;

use common\models\user\contact\Address;

/**
 *
 * @author vistart <i@vistart.name>
 */
final class AddressController extends DefaultController
{
    use ContactTrait;

    const SESSKEY_MY_ADDRESS = 'sesskey_my_address';

    public $layout = 'address/main';

    public function actionIndex()
    {
        return $this->render('index', ['newModel' => static::getIdentityNewModel(Address::className())]);
    }

    public function actionNew()
    {
        $result = static::insertItem(Address::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ADDRESS, $result);
        return $this->redirect(['address/index']);
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, Address::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ADDRESS, $result);
        return $this->redirect(['address/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, Address::className());
        static::setFlashNotificationByResult(static::SESSKEY_MY_ADDRESS, $result);
        return $this->redirect(['address/index']);
    }

    public static function getFlash()
    {
        return static::getFlashNotifification(static::SESSKEY_MY_ADDRESS);
    }
}
