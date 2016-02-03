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

/**
 * Description of PanelWidget
 *
 * @author vistart <i@vistart.name>
 */
class PanelWidget extends \yii\base\Widget
{

    public function run()
    {
        return $this->render('panel');
    }
}
