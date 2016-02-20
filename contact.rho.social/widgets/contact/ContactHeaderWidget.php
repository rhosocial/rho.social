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

namespace rho_contact\widgets\contact;

use common\models\user\User;
use Yii;

/**
 * Description of ContactHeaderWidget
 *
 * @author vistart <i@vistart.name>
 */
class ContactHeaderWidget extends \yii\base\Widget
{

    public $user;

    public function init()
    {
        if (!Yii::$app->user->isGuest && !($this->user instanceof User)) {
            $this->user = Yii::$app->user->identity;
        }
    }

    public function run()
    {
        return $this->render('contact-header', ['user' => $this->user]);
    }
}
