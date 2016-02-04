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

use common\models\user\relation\FollowGroup;

/**
 * Description of PanelGroupWidget
 *
 * @author vistart <i@vistart.name>
 */
class PanelGroupWidget extends \yii\base\Widget
{

    /**
     * @var FollowGroup[] 
     */
    public $groups = [];

    public function run()
    {
        return $this->render('panel-group', ['groups' => $this->groups]);
    }
}
