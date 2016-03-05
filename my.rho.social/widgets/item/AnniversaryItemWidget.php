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

/**
 * Description of AnniversaryItemWidget
 *
 * @author vistart <i@vistart.name>
 */
class AnniversaryItemWidget extends ItemWidget
{

    public function run()
    {
        return $this->render('anniversary-item', ['model' => $this->model, 'action' => $this->action, 'delete' => $this->delete]);
    }
}
