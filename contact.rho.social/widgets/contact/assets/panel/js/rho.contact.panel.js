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
        btnRefresh: "contact-panel-list-refresh",
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
            if (pub.currentPage < 0) {
                pub.currentPage = 0;
            }
            if (pub.currentPage >= pub.totalPage) {
                pub.currentPage = pub.totalPage - 1;
            }
            replaceList();
        },
        initModule: function () {
            if (contactPanelListNext !== undefined && typeof contactPanelListNext === "String") {
                pub.btnNext = contactPanelListNext;
            }
            if (contactPanelListPrev !== undefined && typeof contactPanelListPrev === "String") {
                pub.btnPrev = contactPanelListPrev;
            }
            if (contactPanelListRefresh !== undefined && typeof contactPanelListRefresh === "String") {
                pub.btnRefresh = contactPanelListRefresh;
            }
            if (contactPanelList !== undefined && typeof contactPanelList === "String") {
                pub.divList = contactPanelList;
            }
            if (contactPanelLoader !== undefined && typeof contactPanelLoader === "String") {
                pub.divLoader = contactPanelLoader;
            }
            if (contactPanelTextCurrentPage !== undefined && typeof contactPanelTextCurrentPage === "String") {
                pub.txtCurrentPage = contactPanelTextCurrentPage;
            }
            if (contactPanelTextTotalPage !== undefined && typeof contactPanelTextTotalPage === "String") {
                pub.txtTotalPage = contactPanelTextTotalPage;
            }
            if (LoaderAnimation !== undefined && typeof LoaderAnimation === "String") {
                pub.Loader = LoaderAnimation;
            }
        },
        registerBtnEvents: function () {
            $("#" + pub.btnPrev).click(pub.prev);
            $("#" + pub.btnNext).click(pub.next);
            $("#" + pub.btnRefresh).click(pub.refresh);
        },
    };
    function replaceList() {
        emptyList();
        attachLoader();
        getList(getListSuccess, getListFail);
    }
    function getList(successCallback, failCallback) {
        rho.post("/v1/contact/widget-list", {pageSize: pub.pageSize, currentPage: pub.currentPage}, successCallback, failCallback);
    }
    function getListSuccess(data, status) {
        detachLoader();
        appendList(data);
        Holder.run();
    }
    function getListFail(data, status) {
        detachLoader();
        //rho.alert(data.message);
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
    function count() {
        rho.post();
    }
    function setPagination() {
        
    }
    return pub;
})(jQuery);
jQuery(document).ready(function () {
    rho.contact.panel.registerBtnEvents();
    rho.contact.panel.refresh();
});