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
 * Description of AddressListWidget
 *
 * @author vistart <i@vistart.name>
 */
class AddressListWidget extends ItemListWidget
{

    public function run()
    {
        return $this->render('address-item-list', ['getItemUrl' => $this->getItemUrl, 'getCountUrl' => $this->getCountUrl]);
    }

    public function item($model, $action)
    {
        return AddressWidget::widget(['model' => $model, 'action' => $action]);
    }
}
