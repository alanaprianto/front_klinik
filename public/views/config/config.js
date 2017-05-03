'use strict';

var app = angular.module('config', []);

function mainConfig () {
    var location = window.location.host;
    var parts = location.split('.');
    var app = parts[0];
    switch (app) {
        case 'development':
            var url = 'http://simrs.api.teknolands.com/';
            var currency = 'Rp';
            var decimalSeparator = ',';
            var zipLength = 5;
            var countryCode = '+62';
            break;
        default:
            var url = 'http://simrs.api.teknolands.com/';
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
        countryCode: countryCode,
        menus: [
            {
                "penata_jasa": [2, 3]
            },
            {
                "admin": [0, 1, 2, 3, 4, 5]
            },
            {
                "admin_apotek": [0, 2]
            },
            {
                "apotek": [0, 2]
            },
            {
                "admin_kasir": [2, 4]
            },
            {
                "loket": [1,2]
            },
            {
                "admin_loket": [1,2]
            },
            {
                "kasir": [2,4]
            },
            {
                "admin_kasir": [2,4]
            },
        ]
    }
}

app.constant('config', (mainConfig)());