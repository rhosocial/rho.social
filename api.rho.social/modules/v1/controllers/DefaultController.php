<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace rho_api\modules\v1\controllers;

/**
 * 该控制器用于接受 v1 模型的默认控制器和默认动作。
 * @author vistart <i@vistart.name>
 */
class DefaultController extends \yii\rest\Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = \yii\web\Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionIndex()
    {
        throw new \yii\web\ForbiddenHttpException("You are not allowed to access this end-point.");
    }
}
