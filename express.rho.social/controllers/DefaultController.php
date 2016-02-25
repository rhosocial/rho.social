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

namespace rho_express\controllers;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
class DefaultController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
