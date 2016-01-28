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

namespace rho_my\helpers;

/**
 * Description of BaseViewHelper
 *
 * @author vistart <i@vistart.name>
 */
class BaseViewHelper
{

    public static function mark($mark, $wrap = true)
    {
        return YII_DEBUG || YII_ENV == YII_ENV_PROD ? "<!-- $mark -->" . ($wrap ? "\n" : '') : "";
    }

    public static function markBegin($mark)
    {
        return static::mark($mark . ': BEGIN');
    }

    public static function markEnd($mark)
    {
        return static::mark($mark . ': END');
    }

    public static function div($content, $row = true, $col = false, $wrap = true)
    {
        if ($row) {
            $content = '<div class="row">' . ($wrap ? "\n" : '') . $content . '</div>' . ($wrap ? "\n" : '');
        }
        if ($col) {
            $content = '<div class="' . $col . '">' . ($wrap ? "\n" : '') . $content . '</div>' . ($wrap ? "\n" : '');
        }
        return $content;
    }

    public static function divWithMark($mark, $content, $row = true, $col = false)
    {
        return static::markBegin($mark) . static::div($content, $row, $col) . static::markEnd($mark);
    }
}
