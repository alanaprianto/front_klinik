'use strict';

var app = angular.module('config', []);

function mainConfig () {
    var location = window.location.host;
    var parts = location.split('.');
    var app = parts[0];
    switch (app) {
        case 'development':
            var url = 'http://128.199.175.59/';
            var currency = 'Rp';
            var decimalSeparator = ',';
            var zipLength = 5;
            var countryCode = '+62';
            break;
        default:
            var url = 'http://128.199.175.59/';
            var currency = 'Rp';
            var decimalSeparator = ',';
            var zipLength = 5;
            var countryCode = '+62';
            break;
    }

    return {
        url: url,
        currency: currency,
        decimalSeparator: decimalSeparator,
        zipLength: zipLength,
        countryCode: countryCode
    }
}

app.constant('config', (mainConfig)());