/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */


function load_contact(user_no) {
    /**
     * TO DO:
     * 1. check whether user no. matches the regex.
     * 2. post loading request to server, update rate limiter.
     * 3. receive the server response.
     * 4. check whether the response contains errors.
     * 4.1 if error(s) occured, return directly.
     * 4.2 if succeeded, store the contact into local browser and replace contact panel with it.
     */
    checkNo(user_no);
    $.post(get_contact_url, {user_no: user_no}, function (data, status) {
        data = jQuery.parseJSON(data);
        if (checkError(data)) {
            return;
        }
        storeLocal(data);
        replaceContactPanel(data);
    });
}

function checkNo(user_no)
{
    
}