/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

rho.my.address = (function ($) {
    var pub = {
        /**
         * selector: REQUIRED.
         * url: REQUIRED.
         * prepend: REQUIRED.
         * valueParam: REQUIRED.
         * displayValueParam: REQUIRED.
         */
        country: [],
        province: [],
        city: [],
        district: [],
        value: [],
        url: "",
        prepend: "Choose One...",
        optionNone: "<option value='none'>None</option>",
        selector: null,
        bind: function (formId) {
            $("form[id='" + formId + "']").each(function () {
                var current = $(this);
                $(this).find(pub.country.selector).change(function () {
                    changeProvinceSelector(current);
                });
                $(this).find(pub.province.selector).change(function () {
                    changeCitySelector(current);
                });
                $(this).find(pub.city.selector).change(function () {
                    changeDistrictSelector(current);
                });
                setCountrySelector(current);
            });
        },
    };

    function changeProvinceSelector(selector) {
        var currentCountry = selector.find(pub.country.selector);
        var currentProvince = selector.find(pub.province.selector);
        var currentCity = selector.find(pub.city.selector);
        var currentDistrict = selector.find(pub.district.selector);
        var code = currentCountry.find("option:selected").val();
        if (!code || code.toLowerCase() === "none" || code === "") {
            currentProvince.empty();
            currentProvince.append(pub.optionNone);
            currentCity.empty();
            currentCity.append(pub.optionNone);
            currentDistrict.empty();
            currentDistrict.append(pub.optionNone);
            return false;
        }
        rho.post(pub.province.url, {country: code}, function (data, status) {
            currentProvince.empty();
            currentCity.empty();
            currentCity.prepend(pub.optionNone);
            currentDistrict.empty();
            currentDistrict.prepend(pub.optionNone);
            if (data.length === 0) {
                currentProvince.prepend(pub.optionNone);
                return false;
            }
            if (!(pub.province.displayValueParam in data[0])) {
                currentProvince.prepend(pub.optionNone);
                return false;
            }
            prependSelector(currentProvince, '', pub.province.prepend);
            $.each(data, function (i, item) {
                appendSelector(currentProvince, item[pub.province.valueParam], item[pub.province.displayValueParam]);
            })
            enableSelector(currentProvince);
        });
    }

    function changeCitySelector(selector) {
        var currentCountry = selector.find(pub.country.selector);
        var currentProvince = selector.find(pub.province.selector);
        var currentCity = selector.find(pub.city.selector);
        var currentDistrict = selector.find(pub.district.selector);
        var country_code = currentCountry.find("option:selected").val();
        var code = currentProvince.find("option:selected").val();
        if (!code || code.toLowerCase() === "none" || code === "") {
            currentCity.empty();
            currentCity.append(pub.optionNone);
            currentDistrict.empty();
            currentDistrict.append(pub.optionNone);
            return false;
        }
        rho.post(pub.city.url, {country: country_code, province: code}, function (data, status) {
            currentCity.empty();
            currentDistrict.empty();
            currentDistrict.prepend(pub.optionNone);
            if (data.length === 0) {
                currentCity.prepend(pub.optionNone);
                return false;
            }
            if (!(pub.city.displayValueParam in data[0])) {
                currentCity.prepend(pub.optionNone);
                return false;
            }
            prependSelector(currentCity, '', pub.city.prepend);
            $.each(data, function (i, item) {
                appendSelector(currentCity, item[pub.city.valueParam], item[pub.city.displayValueParam]);
            })
            enableSelector(currentCity);
        });
    }

    function changeDistrictSelector(selector) {
        var currentCountry = selector.find(pub.country.selector);
        var currentProvince = selector.find(pub.province.selector);
        var currentCity = selector.find(pub.city.selector);
        var currentDistrict = selector.find(pub.district.selector);
        var country_code = currentCountry.find("option:selected").val();
        var province_code = currentProvince.find("option:selected").val();
        var code = currentCity.find("option:selected").val();
        if (!code || code.toLowerCase() === "none" || code === "") {
            currentDistrict.empty();
            currentDistrict.append(pub.optionNone);
            return false;
        }
        rho.post(pub.district.url, {country: country_code, province: province_code, city: code}, function (data, status) {
            currentDistrict.empty();
            if (data.length === 0) {
                currentDistrict.prepend(pub.optionNone);
                return false;
            }
            if (!(pub.district.displayValueParam in data[0])) {
                currentDistrict.prepend(pub.optionNone);
                return false;
            }
            prependSelector(currentDistrict, '', pub.district.prepend);
            $.each(data, function (i, item) {
                appendSelector(currentDistrict, item[pub.district.valueParam], item[pub.district.displayValueParam]);
            })
            enableSelector(currentDistrict);
        });
    }

    function setCountrySelector(form) {
        var addressId = form.attr("address_id");
        var countrySelector = form.find(pub.country.selector);
        var provinceSelector = form.find(pub.province.selector);
        var citySelector = form.find(pub.city.selector);
        var districtSelector = form.find(pub.district.selector);
        disableSelector(countrySelector);
        disableSelector(provinceSelector);
        disableSelector(citySelector);
        disableSelector(districtSelector);
        rho.post(pub.country.url, {}, function (data, status) {
            countrySelector.empty();
            prependSelector(countrySelector, '', pub.country.prepend);
            $.each(data, function (i, item) {
                appendSelector(countrySelector, item[pub.country.valueParam], item[pub.country.displayValueParam]);
            });
            if (typeof (pub.value[addressId]["country"]) === "undefined"
                    || pub.value[addressId]["country"] === false
                    || pub.value[addressId]["country"] === ""
                    || pub.value[addressId]["country"] === "none") {
                enableSelector(countrySelector);
                enableSelector(provinceSelector);
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            countrySelector.find("option[value='" + pub.value[addressId]["country"] + "']").attr("selected", true);
            setProvinceSelector(form);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(countrySelector);
    }

    function setProvinceSelector(form) {
        var addressId = form.attr("address_id");
        var provinceSelector = form.find(pub.province.selector);
        var citySelector = form.find(pub.city.selector);
        var districtSelector = form.find(pub.district.selector);
        rho.post(pub.province.url, {country: pub.value[addressId]["country"]}, function (data, status) {
            if (data.length === 0) {
                enableSelector(provinceSelector);
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            if (!(pub.province.displayValueParam in data[0])) {
                enableSelector(provinceSelector);
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            provinceSelector.empty();
            prependSelector(provinceSelector, '', pub.province.prepend);
            $.each(data, function (i, item) {
                appendSelector(provinceSelector, item[pub.province.valueParam], item[pub.province.displayValueParam]);
            })
            if (typeof (pub.value[addressId]["province"]) === "undefined"
                    || pub.value[addressId]["province"] === false
                    || pub.value[addressId]["province"] === ""
                    || pub.value[addressId]["province"] === "none") {
                enableSelector(provinceSelector);
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            provinceSelector.find("option[value='" + pub.value[addressId]["province"] + "']").attr("selected", true);
            setCitySelector(form);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(provinceSelector);
    }

    function setCitySelector(form) {
        var addressId = form.attr("address_id");
        var citySelector = form.find(pub.city.selector);
        var districtSelector = form.find(pub.district.selector);
        rho.post(pub.city.url, {country: pub.value[addressId]["country"], province: pub.value[addressId]["province"]}, function (data, status) {
            if (data.length === 0) {
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            if (!(pub.city.displayValueParam in data[0])) {
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            citySelector.empty();
            prependSelector(citySelector, '', pub.city.prepend);
            $.each(data, function (i, item) {
                appendSelector(citySelector, item[pub.city.valueParam], item[pub.city.displayValueParam]);
            })
            if (typeof (pub.value[addressId]["city"]) === "undefined"
                    || pub.value[addressId]["city"] === false
                    || pub.value[addressId]["city"] === ""
                    || pub.value[addressId]["city"] === "none") {
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            citySelector.find("option[value='" + pub.value[addressId]["city"] + "']").attr("selected", true);
            setDistrictSelector(form);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(citySelector);
    }

    function setDistrictSelector(form) {
        var addressId = form.attr("address_id");
        var districtSelector = form.find(pub.district.selector);
        rho.post(pub.district.url, {country: pub.value[addressId]["country"], province: pub.value[addressId]["province"], city: pub.value[addressId]["city"]}, function (data, status) {
            if (data.length === 0) {
                enableSelector(districtSelector);
                return false;
            }
            if (!(pub.district.displayValueParam in data[0])) {
                enableSelector(districtSelector);
                return false;
            }
            districtSelector.empty();
            prependSelector(districtSelector, '', pub.district.prepend);
            $.each(data, function (i, item) {
                appendSelector(districtSelector, item[pub.district.valueParam], item[pub.district.displayValueParam]);
            })
            if (typeof (pub.value[addressId]["district"]) === "undefined"
                    || pub.value[addressId]["district"] === false
                    || pub.value[addressId]["district"] === ""
                    || pub.value[addressId]["district"] === "none") {
                enableSelector(districtSelector);
                return false;
            }
            districtSelector.find("option[value='" + pub.value[addressId]["district"] + "']").attr("selected", true);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(districtSelector);
    }

    function prependSelector(selector, value, displayValue) {
        selector.prepend("<option value='" + value + "'>" + displayValue + "</option>");
    }

    function appendSelector(selector, value, displayValue) {
        selector.append("<option value='" + value + "'>" + displayValue + "</option>");
    }

    function disableSelector(selector) {
        selector.attr("disabled", "disabled");
    }

    function enableSelector(selector) {
        selector.removeAttr("disabled");
    }
    return pub;
})(jQuery);