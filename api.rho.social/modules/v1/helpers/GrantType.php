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

namespace rho_api\modules\v1\helpers;

use yii\web\BadRequestHttpException;

/**
 * Error Numbern Range: 1004x;
 * 10041: Grant Type Not Specified.
 * 10042: Invalid Grant Type (Non exists).
 * 10043: Invalid Grant Type (Incorrect).
 * @author vistart <i@vistart.name>
 */
class GrantType
{

    const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';
    const GRANT_TYPE_CLIENT_CREDENTIALS = 'client_credentials';

    public static $GRANT_TYPES = [
        self::GRANT_TYPE_CLIENT_CREDENTIALS,
        self::GRANT_TYPE_AUTHORIZATION_CODE,
    ];

    /**
     * Check if the grant type is valid or not.
     * @param type $grant_type The Grant Type String.
     * @return boolean True if grant type is valid.
     * @throws BadRequestHttpException 
     */
    public static function check($grant_type, $valid_grant_type = null)
    {
        if (empty($grant_type)) {
            throw new BadRequestHttpException('Grant Type Not Specified.', 10041);
        }

        if (empty($valid_grant_type)) {
            if (!in_array($grant_type, self::$GRANT_TYPES)) {
                throw new BadRequestHttpException('Invalid Grant Type.', 10042);
            }
        } elseif ($grant_type != $valid_grant_type) {
            throw new BadRequestHttpException('Invalid Grant Type.', 10043);
        }
        return true;
    }
}
