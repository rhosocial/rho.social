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

namespace rho_api\modules\v1;

use Yii;
use yii\web\Response;

/**
 * 该模块为 RESTful API 第一版。
 * 每个控制器代表一个主要的功能区，每个动作代表一个 API 端点。
 * 
 * 所有的返回内容格式均为 JSON 字符串，且返回内容为两个元素组成的数组：
 * success：boolean 请求是否成功；
 * data：mixed 请求成功后的内容，或不成功时的提示。
 * 
 * 开发者可以通过只判断 success 的值来确定请求是否已成功执行。
 * 
 * 访问失败返回值示例：
 * https://api.rho.social/v1 是不正确的 API 端点，实际访问的是 v1 模块 default
 * 控制器 index 动作，该动作不允许任何用户访问（详见具体代码）。如果用户向该地
 * 址发送请求，均会收到 Forbidden 提示，返回的 JSON 字符串如下：
 * {"success":false,"data":{"name":"Forbidden","message":"You are not allowed to access this end-point.","code":0,"status":403}}
 * 只要服务器成功收到请求，则 HTTP 状态码均为 200，请求具体成功执行与否的状态码
 * 则在 JSON 字符串中提现。如上述示例中，请求的真实状态码是 403。
 * 请求失败时，返回的内容中 success 固定为 false，data 则包含了一个四个元素的
 * 数组，数组元素固定为 name、message、code 和 status。其中 name 和 status 的
 * 含义与 HTTP 状态名称和状态码的定义相同，message 包含的是提示信息，code 则为
 * 具体错误代码。
 * 具体错误代码应当唯一，提示信息应当能够具体指出错误原因。
 * 
 * 具体控制器和包含动作的使用方法，以及返回内容，参见具体的控制器和动作说明。
 * 该模块下的所有控制器均不包含视图。
 * @author vistart <i@vistart.name>
 */
class Module extends \yii\base\Module
{

    public $controllerNamespace = 'rho_api\modules\v1\controllers';

    public function init()
    {
        parent::init();
        Yii::$app->response->on(Response::EVENT_BEFORE_SEND, [$this, 'responseBeforeSend']);
    }

    /**
     * 转换路由名称，将 '/' 转换为 '_'。
     * @param string $route
     * @return string 
     */
    public static function transRouteToName($route)
    {
        return str_replace('/', '_', $route);
    }

    /**
     * 获取 API 名称。
     * @param string $route
     * @return string 转换后的 API 名称。
     */
    public static function getApiName($route)
    {
        return 'api_' . self::transRouteToName($route) . '_rate_limit';
    }

    /**
     * 
     * @param type $event
     */
    protected function responseBeforeSend($event)
    {
        $response = $event->sender;
        if ($response->data !== null) {
            // Clear the 'type' property in all responses.
            if (isset($response->data['type'])) {
                unset($response->data['type']);
            }
            $response->data = [
                'success' => $response->isSuccessful,
                'data' => $response->data,
            ];
            $response->statusCode = 200;
        }
    }
}
