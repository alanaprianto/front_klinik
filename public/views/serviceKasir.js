'use strict';

angular.module('adminApp')
    .factory('ServicesKasir', function($resource, config) {
    return $resource(config.url + ':module/:submodule/:controller/:action/:id', {
        id: '@_id'
    }, {
    	getKasirPayments: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'kasir',
                controller: 'payments',
            }
        },
        getKasirPaymentsCreate: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'kasir',
                controller: 'payments',
            }
        },
         getVisitor: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'kasir',
                controller: 'visitors'
            }
        },
        createKasirPayments: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'kasir',
                controller: 'payments',
            }
        }
    });
});