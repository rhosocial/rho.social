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
        country: [],
        province: [],
        city: [],
        district: [],
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
            currentProvince.prepend("<option value=''>" + pub.province.prepend + "</option>");
            $.each(data, function (i, item) {
                currentProvince.append("<option value='" + item[pub.province.valueParam] + "'>" + item[pub.province.displayValueParam] + "</option>");
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
            currentCity.prepend("<option value=''>" + pub.city.prepend + "</option>");
            $.each(data, function (i, item) {
                currentCity.append("<option value='" + item[pub.city.valueParam] + "'>" + item[pub.city.displayValueParam] + "</option>");
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
            currentDistrict.prepend("<option value=''>" + pub.district.prepend + "</option>");
            $.each(data, function (i, item) {
                currentDistrict.append("<option value='" + item[pub.district.valueParam] + "'>" + item[pub.district.displayValueParam] + "</option>");
            })
            enableSelector(currentDistrict);
        });
    }

    function setCountrySelector(form) {
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
            countrySelector.prepend("<option value=''>" + pub.country.prepend + "</option>");
            $.each(data, function (i, item) {
                countrySelector.append("<option value='" + item[pub.country.valueParam] + "'>" + item[pub.country.displayValueParam] + "</option>");
            });
            if (typeof (pub.country.value) === "undefined"
                    || pub.country.value === false
                    || pub.country.value === ""
                    || pub.country.value === "none") {
                enableSelector(countrySelector);
                enableSelector(provinceSelector);
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            countrySelector.find("option[value='" + pub.country.value + "']").attr("selected", true);
            setProvinceSelector(form);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(countrySelector);
    }

    function setProvinceSelector(form) {
        var provinceSelector = form.find(pub.province.selector);
        var citySelector = form.find(pub.city.selector);
        var districtSelector = form.find(pub.district.selector);
        rho.post(pub.province.url, {country: pub.country.value}, function (data, status) {
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
            provinceSelector.prepend("<option value=''>" + pub.province.prepend + "</option>");
            $.each(data, function (i, item) {
                provinceSelector.append("<option value='" + item[pub.province.valueParam] + "'>" + item[pub.province.displayValueParam] + "</option>");
            })
            if (typeof (pub.province.value) === "undefined"
                    || pub.province.value === false
                    || pub.province.value === ""
                    || pub.province.value === "none") {
                enableSelector(provinceSelector);
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            provinceSelector.find("option[value='" + pub.province.value + "']").attr("selected", true);
            setCitySelector(form);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(provinceSelector);
    }

    function setCitySelector(form) {
        var citySelector = form.find(pub.city.selector);
        var districtSelector = form.find(pub.district.selector);
        rho.post(pub.city.url, {country: pub.country.value, province: pub.province.value}, function (data, status) {
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
            citySelector.prepend("<option value=''>" + pub.city.prepend + "</option>");
            $.each(data, function (i, item) {
                citySelector.append("<option value='" + item[pub.city.valueParam] + "'>" + item[pub.city.displayValueParam] + "</option>");
            })
            if (typeof (pub.city.value) === "undefined"
                    || pub.city.value === false
                    || pub.city.value === ""
                    || pub.city.value === "none") {
                enableSelector(citySelector);
                enableSelector(districtSelector);
                return false;
            }
            citySelector.find("option[value='" + pub.city.value + "']").attr("selected", true);
            setDistrictSelector(form);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(citySelector);
    }

    function setDistrictSelector(form) {
        var districtSelector = form.find(pub.district.selector);
        rho.post(pub.district.url, {country: pub.country.value, province: pub.province.value, city: pub.city.value}, function (data, status) {
            if (data.length === 0) {
                enableSelector(districtSelector);
                return false;
            }
            if (!(pub.district.displayValueParam in data[0])) {
                enableSelector(districtSelector);
                return false;
            }
            districtSelector.empty();
            districtSelector.prepend("<option value=''>" + pub.district.prepend + "</option>");
            $.each(data, function (i, item) {
                districtSelector.append("<option value='" + item[pub.district.valueParam] + "'>" + item[pub.district.displayValueParam] + "</option>");
            })
            if (typeof (pub.district.value) === "undefined"
                    || pub.district.value === false
                    || pub.district.value === ""
                    || pub.district.value === "none") {
                enableSelector(districtSelector);
                return false;
            }
            districtSelector.find("option[value='" + pub.district.value + "']").attr("selected", true);
            return true;
        }, function (data, status) {
            return false;
        });
        enableSelector(districtSelector);
    }

    function disableSelector(selector) {
        selector.attr("disabled", "disabled");
    }

    function enableSelector(selector) {
        selector.removeAttr("disabled");
    }
    return pub;
})(jQuery);