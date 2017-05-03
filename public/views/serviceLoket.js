'use strict';

angular.module('adminApp')
    .factory('ServicesLoket', function($resource, config) {
    return $resource(config.url + ':module/:submodule/:controller/:action/:id', {
        id: '@_id'
    }, {
    	getLoketAntrianList: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:type',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'antrian',
                action: 'list',
                type: null
            }
        },
        updateLoketAntrianStatus: {
            method: 'PUT',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'antrian',
                action: 'update-status',
                id: null
            }
        },
        getLoketRegisters: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'registers'
            }
        },
        getLoketRegistersCreate: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk_id',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'registers',
                action: 'create',
                kiosk_id: null
            }
        },
        getLoketPendaftaranTambah: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk_id',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'tambah',
                kiosk_id: null
            }
        },
        getLoketPendaftaranPoli: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'pilih-poli',
                id: null
            }
        },
        getVisitor: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'visitors'
            }
        },
        getLoketPendaftaranPatient: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:query',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'get_patient',
                query: null
            }
        },
        createLoketPendaftaranPatient: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'store'
            }
        },
        updateLoketPendaftaranPatient: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'store',
                id: null
            }
        },
        getLoketPendaftaranRujukan: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'tambah-rujukan',
                id: null
            }
        },
        createLoketPendaftaranRujukan: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'loket',
                controller: 'pendaftaran',
                action: 'tambah-rujukan'
            }
        }
    });
});