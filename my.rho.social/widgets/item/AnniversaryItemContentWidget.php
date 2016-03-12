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

namespace rho_my\widgets\item;

use yii\base\Widget;

/**
 * Description of ItemContentWidget
 *
 * @author vistart <i@vistart.name>
 */
class AnniversaryItemContentWidget extends Widget
{

    public $model;
    public $buttons = false;

    public function run()
    {
        return $this->render('item-content', ['model' => $this->model, 'buttons' => $this->buttons]);
    }
}
