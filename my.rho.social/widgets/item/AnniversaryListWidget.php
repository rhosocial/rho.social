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
 * Description of AnniversaryListWidget
 *
 * @author vistart <i@vistart.name>
 */
class AnniversaryListWidget extends ItemListWidget
{

    public function run()
    {
        return $this->render('anniversary-list', ['getItemUrl' => $this->getItemUrl, 'getCountUrl' => $this->getCountUrl]);
    }
}
