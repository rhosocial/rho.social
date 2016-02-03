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
 * Description of Url
 *
 * @author vistart <i@vistart.name>
 */
class URL extends BaseContactItem
{
    public $confirmCodeAttribute = false;

    public static function tableName()
    {
        return '{{%user_url}}';
    }

    public function createUrl($config = array())
    {
        return parent::createModel($config);
    }

    public function getUrls()
    {
        return parent::getModels();
    }
}
