'use strict';

angular.module('adminApp')
    .factory('ServicesPenataJasa', function($resource, config) {
    return $resource(config.url + ':module/:submodule/:controller/:action/:id', {
        id: '@_id'
    }, {
    	getPenataJasaAntrian: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:type',
            params: {
                module: 'api',
                submodule: 'penatajasa',
                controller: 'antrian',
            }
        },
         getVisitor: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'penata-jasa',
                controller: 'visitors'
            }
        },
        getPenataJasaAntrianList: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'penatajasa',
                controller: 'antrian',
                action: 'list',
            }
        },
        updatePenataJasaAntrianList: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk',
            params: {
                module: 'api',
                submodule: 'penatajasa',
                controller: 'antrian',
                action: 'update-status',
                kiosk:null
            }
        },
        getPenataJasaPriksa: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id/:rujukan',
            params: {
                module: 'api',
                submodule: 'penatajasa',
                controller: 'priksa',
                action: 'update-status',
                reference_id: null,
                rujukan: null
            }
        },
        createPenataJasaPeriksa: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id',
            params: {
                module: 'api',
                submodule: 'penatajasa',
                controller: 'priksa',
                action: 'update-status',
                reference_id: null
            }
        }
    });
});