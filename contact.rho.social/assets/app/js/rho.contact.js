/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

rho.contact = function ($) {
    var pub = {
        get: function (user_no) {
            rho.post('/v1/contact/get', {id: user_no}, function (data, status) {

            }, function (data, status) {
                rho.alert(data.message);
            });
        },
        list: function () {

        }
    };
    return pub;
}(jQuery);


$(document).ready(function () {
    rho.contact.get(41170537);
});