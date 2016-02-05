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
$commonParamsFile = __DIR__ . '/../../common/config/params.php';
$commonParamsLocalFile = __DIR__ . '/../../common/config/params-local.php';
$paramsFile = __DIR__ . '/params.php';
$paramsLocalFile = __DIR__ . '/params-local.php';
$params = [];
if (file_exists($commonParamsFile)) {
    $params = array_merge($params, require($commonParamsFile));
}
if (file_exists($commonParamsLocalFile)) {
    $params = array_merge($params, require($commonParamsLocalFile));
}
if (file_exists($paramsFile)) {
    $params = array_merge($params, require($paramsFile));
}
if (file_exists($paramsLocalFile)) {
    $params = array_merge($params, require($paramsLocalFile));
}
return $params;
