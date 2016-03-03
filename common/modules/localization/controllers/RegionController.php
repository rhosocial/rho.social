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

namespace common\modules\localization\controllers;

use common\models\constants\region\Country;
use common\models\constants\region\Province;
use Yii;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Description of RegionController
 *
 * @author vistart <i@vistart.name>
 */
class RegionController extends Controller
{

    public $defaultAction = 'countries';

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'text/html' => Response::FORMAT_JSON,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'countries' => ['post'],
                    'provinces' => ['post'],
                    'cities' => ['post'],
                    'districts' => ['post'],
                ],
            ],
        ];
    }

    public function actionCountries()
    {
        return Country::asArray(Country::find()->all());
    }

    public function actionProvinces()
    {
        $country = Yii::$app->request->post('country');
        return Province::asArray(Country::get($country)->provinces);
    }

    public function actionCities()
    {
        $country = Yii::$app->request->post('country');
        $province = Yii::$app->request->post('province');
        return City::asArray(Country::get($country)->getProvince($province)->cities);
    }

    public function actionDistricts()
    {
        $country = Yii::$app->request->post('country');
        $province = Yii::$app->request->post('province');
        $city = Yii::$app->request->post('city');
        return District::asArray(Country::get($country)->getProvince($province)->getCity($city)->districts);
    }
}
