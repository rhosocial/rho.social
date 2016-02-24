/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

rho = (function ($) {
    var pub = {
        alert: function (content) {
            window.alert(content);
        },
        post: function (url, parameters, successCallback, failCallback) {
            $.post(url, parameters, function (data, status) {
                if ((status !== "success" || !data.success)&& $.isFunction(failCallback)) {
                    failCallback(data.data, status);
                    return;
                }
                if ($.isFunction(successCallback)) {
                    successCallback(data.data, status);
                }
            });
        },
        initModule: function (module) {
            if (module.isActive === undefined || module.isActive) {
                if ($.isFunction(module.init)) {
                    module.init();
                }
                $.each(module, function () {
                    if ($.isPlainObject(this)) {
                        pub.initModule(this);
                    }
                });
            }
        }
    };
    return pub;
})(jQuery);

jQuery(document).ready(function () {
    rho.initModule(rho);
});