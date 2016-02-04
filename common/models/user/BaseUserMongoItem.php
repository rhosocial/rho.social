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

namespace common\models\user;

/**
 * Description of BaseUserMongoItem
 *
 * @author vistart <i@vistart.name>
 */
abstract class BaseUserMongoItem extends \vistart\Models\models\BaseMongoBlameableModel
{
    use UserItemTrait;

    public $confirmationAttribute = false;
    public $contentTypeAttribute = 'type';

    public function init()
    {
        $this->attachUserClass();
        parent::init();
    }
}
