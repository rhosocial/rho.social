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
            if (user_no === undefiend || typeof user_no !== "Integer") {
                return;
            }
            rho.post('/v1/contact/get', {id: user_no}, function (data, status) {

            }, function (data, status) {
                //rho.alert(data.message);
            });
        },
        list: function (page_size, current_page) {
            page_size = page_size || 10;
            current_page = current_page || 0;
            rho.post('/v1/contact/list', {pageSize: page_size, currentPage: current_page}, function (data, status) {
                //rho.alert(data.pageSize);
            }, function (data, status) {
                //rho.alert(data.message);
            });
        },
    };
    return pub;
}(jQuery);


$(document).ready(function () {
});