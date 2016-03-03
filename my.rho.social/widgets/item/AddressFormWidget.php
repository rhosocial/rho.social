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
 * Description of AddressFormWidget
 *
 * @author vistart <i@vistart.name>
 */
class AddressFormWidget extends FormWidget
{

    public function run()
    {
        return $this->render('address-form', ['model' => $this->model, 'title' => $this->title, 'id' => $this->id, 'action' => $this->action]);
    }
}
