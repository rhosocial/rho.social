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
        pageCountUrl: '/v1/contact/page-count',
        itemWidgetsUrl: '/v1/contact/widget-list',
        itemWidgetUrl: '/v1/contact/widget-get',
        btnNext: "contact-panel-list-next",
        btnPrev: "contact-panel-list-prev",
        btnRefresh: "contact-panel-list-refresh",
        divPagination: "contact-panel-pagination",
        divList: "contact-panel-list",
        divLoader: "contact-panel-loader",
        txtCurrentPage: "contact-panel-text-current-page",
        txtTotalPage: "contact-panel-text-total-page",
        Loader: "<div id=\"contact-panel-loader\" class=\"loader\"><div class=\"sk-spinner sk-spinner-three-bounce\"><div class=\"sk-bounce1\"></div><div class=\"sk-bounce2\"></div><div class=\"sk-bounce3\"></div></div></div>",
        currentPage: 0,
        totalPage: 1,
        pageSize: 10,
        next: function () {
            pub.currentPage = pub.currentPage + 1;
            pub.refresh();
        },
        prev: function () {
            pub.currentPage = pub.currentPage - 1;
            pub.refresh();
        },
        refresh: function () {
            getPageCount();
            if (typeof pub.currentPage !== "number" || pub.currentPage < 0) {
                pub.currentPage = 0;
            }
            if (typeof pub.totalPage !== "number") {
                pub.totalPage = 1;
            }
            if (pub.currentPage >= pub.totalPage) {
                pub.currentPage = pub.totalPage - 1;
            }
            replaceList();
        },
        init: function () {
            $(document).ready(function () {
                $("#" + pub.btnPrev).click(pub.prev);
                $("#" + pub.btnNext).click(pub.next);
                $("#" + pub.btnRefresh).click(pub.refresh);
            });
        },
    };
    function getPageCount() {
        rho.post(pub.pageCountUrl, {pageSize: pub.pageSize}, function (data, status) {
            pub.totalPage = data;
        }, function (data, status) {

        });
    }
    function replaceList() {
        emptyList();
        attachLoader();
        getList(getListSuccess, getListFail);
    }
    function getList(successCallback, failCallback) {
        rho.post(pub.itemWidgetsUrl, {pageSize: pub.pageSize, currentPage: pub.currentPage}, successCallback, failCallback);
    }
    function getListSuccess(data, status) {
        detachLoader();
        setPagination();
        appendList(data);
        Holder.run();
        return status;
    }
    function getListFail(data, status) {
        detachLoader();
        appendList(data.message);
        return status;
    }
    function emptyList() {
        $("#" + pub.divList).empty();
    }
    function appendList(data) {
        $("#" + pub.divList).append(data);
    }
    function attachLoader() {
        $("#" + pub.divList).append(pub.Loader);
    }
    function detachLoader() {
        $("#" + pub.divLoader).remove();
    }
    function setPagination() {
        $("#" + pub.txtTotalPage).text(pub.totalPage);
        $("#" + pub.txtCurrentPage).text(pub.currentPage + 1);
        if (pub.currentPage <= 0) {
            if (!$("#" + pub.btnPrev).hasClass("disabled"))
                $("#" + pub.btnPrev).addClass("disabled");
        } else {
            if ($("#" + pub.btnPrev).hasClass("disabled"))
                $("#" + pub.btnPrev).removeClass("disabled");
        }
        if (pub.currentPage >= pub.totalPage - 1) {
            if (!$("#" + pub.btnNext).hasClass("disabled"))
                $("#" + pub.btnNext).addClass("disabled");
        } else {
            if ($("#" + pub.btnNext).hasClass("disabled"))
                $("#" + pub.btnNext).removeClass("disabled");
        }
        if (pub.totalPage <= 1) {
            if (!$("#" + pub.divPagination).hasClass("hidden")) {
                $("#" + pub.divPagination).addClass("hidden");
            }
        } else {
            if ($("#" + pub.divPagination).hasClass("hidden")) {
                $("#" + pub.divPagination).removeClass("hidden");
            }
        }
    }
    return pub;
})(jQuery);
jQuery(document).ready(function () {
});