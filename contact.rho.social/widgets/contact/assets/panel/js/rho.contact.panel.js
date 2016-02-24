/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

rho.contact.panel = (function ($) {
    var pub = {
        btnNext: "contact-panel-list-next",
        btnPrev: "contact-panel-list-prev",
        currentPage: 0,
        totalPage: 1,
        pageSize: 10,
        next: function () {

        },
        prev: function () {

        },
        list: function () {

        },
        initModule: function () {
            if (btnPanelListNext !== undefined && typeof btnPanelListNext === "String") {
                pub.btnNext = btnPanelListNext;
            }
            if (btnPanelListPrev !== undefined && typeof btnPanelListPrev === "String") {
                pub.btnPrev = btnPanelListPrev;
            }
            $(document).ready(function () {
                $("#" + pub.btnPrev).click(pub.prev);
                $("#" + pub.btnNext).click(pub.next);
            });
        }
    };
    function count() {
        rho.post();
    }
    function setPagination() {

    }
    return pub;
})(jQuery);