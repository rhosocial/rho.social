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

namespace rho_my\widgets\item;

/**
 * Description of ItemWidget
 *
 * @author vistart <i@vistart.name>
 */
class ItemWidget extends \yii\base\Widget
{

    public $model;
    public $action;

    public function init()
    {
        if (empty($this->action)) {
            $this->action = \Yii::$app->request->resolve();
        }
    }

    public function run()
    {
        return $this->render('item', ['model' => $this->model, 'action' => $this->action]);
    }
}
