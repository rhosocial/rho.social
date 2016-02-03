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

namespace console_test\controllers;

/**
 * Description of TestController
 *
 * @author vistart <i@vistart.name>
 */
class TestController extends \yii\console\Controller
{

    public function actionIndex()
    {
        echo $this->route;
    }
}
