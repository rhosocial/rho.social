/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */
var current_page = 0;
var page_size = 10;
var total_page = 0;
var div_loader = "<div id=\"loader\" class=\"loader\"><div class=\"sk-spinner sk-spinner-three-bounce\"><div class=\"sk-bounce1\"></div><div class=\"sk-bounce2\"></div><div class=\"sk-bounce3\"></div></div></div>";

$(document).ready(function () {
    getCount(true);
    $("#li-prev").click(getPrevPage);
    $("#li-next").click(getNextPage);
});

function getCount(getdata)
{
    $.post(get_count_url, {limit: page_size}, function (data, status) {
        data = jQuery.parseJSON(data)
        if ('totalPages' in data)
        {
            total_page = data.totalPages;
        }
        if (getdata)
        {
            getData();
            setPagination();
        }
    });
}

function setPagination()
{
    $("#page-total").text(total_page);
    $("#page-current").text(current_page + 1);
    if (current_page <= 0) {
        if (!$("#li-prev").hasClass("disabled"))
            $("#li-prev").addClass("disabled");
    } else {
        if ($("#li-prev").hasClass("disabled"))
            $("#li-prev").removeClass("disabled");
    }
    if (current_page >= total_page - 1) {
        if (!$("#li-next").hasClass("disabled"))
            $("#li-next").addClass("disabled");
    } else {
        if ($("#li-next").hasClass("disabled"))
            $("#li-next").removeClass("disabled");
    }
    if (total_page <= 1) {
        if (!$("#pagination").hasClass("hidden")) {
            $("#pagination").addClass("hidden");
        }
    } else {
        if ($("#pagination").hasClass("hidden")) {
            $("#pagination").removeClass("hidden");
        }
    }
}

function attachAnimation()
{
    $("#item-list").empty();
    $("#item-list").append(div_loader);
}

function detachDataAndAnimation(data)
{
    $("#loader").remove();
    $("#item-list").empty();
    $("#item-list").append(data);
}

function getData()
{
    $.post(get_item_url, {page: current_page, limit: page_size}, replaceData);
}

function replaceData(data, status)
{
    detachDataAndAnimation(data);
}

function getNextPage()
{
    var current_value = current_page;
    current_page = current_page + 1;
    if (current_page >= total_page)
    {
        current_page = total_page - 1;
    }
    if (current_value === current_page) {
        return;
    }
    attachAnimation();
    getCount(true);
}

function getPrevPage()
{
    var current_value = current_page;
    current_page = current_page - 1;
    if (current_page < 0)
    {
        current_page = 0;
    }
    if (current_value === current_page) {
        return;
    }
    attachAnimation();
    getCount(true);
}