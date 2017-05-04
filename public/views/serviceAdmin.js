'use strict';

angular.module('adminApp')
    .factory('ServicesAdmin', function($resource, config) {
    return $resource(config.url + ':module/:submodule/:controller/:action/:id', {
        id: '@_id'
    }, {
    	getPenataJasaAntrian: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'queues',
            }
        },
        getPenataJasaAntrianList: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'queues',
                action: 'list',
            }
        },
        updatePenataJasaAntrianList: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'queues',
                action: 'update-status',
                kiosk:null
            }
        },
        getPenataJasaPriksa: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id/:rujukan',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'check-up',
                action: 'update-status',
                reference_id: null,
                rujukan: null
            }
        },
        createPenataJasaPeriksa: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'check-up'
            }
        },
        postPenataJasaMedicalRecord: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'check-up',
                action: 'update-status',
                reference_id: null
            }
        },
        postMedicalRecord: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'check-up',
                action: 'medical-record',                
            }
        },
        getLoketAntrianList: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'queues'
            }
        },
        postKioskCreate: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'kiosk',
                controller: 'create'      
            }
        },
        updateLoketAntrianStatus: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'queues',
                action: 'update',
            }
        },
        getLoketRegisters: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'registers'
            }
        },
        getLoketRegistersCreate: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk_id',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'registers',
                action: 'create',
                kiosk_id: null
            }
        },
        createLoketRegisters: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'registers'
            }
        },
        editLoketTabahRujukan: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'registers'
            }
        },
        getLoketPendaftaranTambah: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk_id',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pendaftaran',
                action: 'tambah',
                kiosk_id: null
            }
        },
        getLoketPendaftaranPoli: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pendaftaran',
                action: 'pilih-poli',
                id: null
            }
        },
        getLoketPendaftaranPatient: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'registers',
                action: 'select-patient'
            }
        },
        createLoketPendaftaranPatient: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pendaftaran',
                action: 'store'
            }
        },
        updateLoketPendaftaranPatient: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pendaftaran',
                action: 'store',
                id: null
            }
        },
        getLoketPendaftaranRujukan: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pendaftaran',
                action: 'tambah-rujukan',
                id: null
            }
        },
        createLoketPendaftaranRujukan: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pendaftaran',
                action: 'tambah-rujukan'
            }
        },
        getKasirPayments: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'payments',
            }
        },
        getKasirPaymentsCreate: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'payments',
            }
        },
        createKasirPayments: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'payments',
            }
        },
        getBatches: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'batches'
            }
        },
        getBuyers: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'batches'
            }
        },
        getDoctorServices: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'doctor-services'
            }
        },
        getVisitor: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'visitors'
            }
        },
        getHospital: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'hospital'
            }
        },
        getICD: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'icd10'
            }
        },
        getInventories: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'inventories'
            }
        },
        getKiosks: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'kiosks'
            }
        },
        getMedicalRecords: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'medical-records'
            }
        },
        getPatiens: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'patiens'
            }
        },
        getPayments: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'payments'
            }
        },
        getPermissions: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'permissions'
            }
        },
        getPharmacySeller: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'pharmacy-seller'
            }
        },
        getPolies: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'polies'
            }
        },
        getRecipes: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'recipes'
            }
        },
        getReferences: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'references'
            }
        },
        getRegisters: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'registers'
            }
        },
        getRoles: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'roles'
            }
        },
        getServices: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'services'
            }
        },
        getSettings: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'settings'
            }
        },
        getStaff: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'staff'
            }
        },
        getStaffJobs: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'staff-jobs'
            }
        },
        getStaffPositions: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'staff-positions'
            }
        },
        getTuslahs: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'tuslahs'
            }
        },
        getUsers: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'users'
            }
        },
        getApotekRecipes: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'apotek',
                controller: 'recipes',
                action: 'list'
            }
        },
        getApotekRecipesCreate: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'recipes',
            }
        },
        createApotekRecipes: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id/:name_tuslah/:tuslah_amount/:amount/:price/:inventory',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'recipes',
                reference_id: null,
                name_tusla: null,
                tuslah_amount: null,
                amount: null,
                price: null, 
                inventory:null,
            }
        },
        getApotekRecipesId: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'admin',
                controller: 'recipes',
                id: null
            }
        }
    });
});