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

namespace common\models\user\contact;

/**
 * Description of Address
 *
 * @author vistart <i@vistart.name>
 */
class Address extends BaseContactItem
{
    public $confirmCodeAttribute = false;

    public static function tableName()
    {
        return '{{%user_address}}';
    }

    public function createAddress($config = array())
    {
        return parent::createModel($config);
    }

    public function getAddresses()
    {
        return parent::getModels();
    }
}
