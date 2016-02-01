<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */
namespace rho\modules\api\models;

use Yii;
use yii\base\Model;
/**
 * AuthorizeForm represent the Web Form of authorization.
 * This model only have an attribute, agree, which detemines that 
 * resource owner agree authorize the third party client.
 *
 * @author vistart
 */
class AuthorizeForm extends Model {
    public $agree = true;
    
    public function init()
    {
        $this->initDefaultValues();
        parent::init();
    }
    
    private function initDefaultValues()
    {
        $this->agree = true;
    }
    
    public function rules()
    {
        return [
            [['agree'], 'required'],
            [['agree'], 'boolean'],
        ];
    }
}
