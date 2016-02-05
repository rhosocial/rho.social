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
/*
function responseBeforeSend($event)
{
    $response = $event->sender;
    if ($response->data !== null)
    {
        // Clear the 'type' property in all responses.
        if (isset($response->data['type']))
        {
            unset($response->data['type']);
        }
        $response->data = [
            'success' => $response->isSuccessful,
            'data' => $response->data,
        ];
        $response->statusCode = 200;
    }
}
*/
return [
    'class' => 'yii\web\Response',
    //'on beforeSend' => 'responseBeforeSend',
];