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
                submodule: 'common',
                controller: 'queues',
            }
        },
        getPenataJasaAntrianList: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'queues',
                action: 'list',
            }
        },
        updatePenataJasaAntrianList: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk',
            params: {
                module: 'api',
                submodule: 'common',
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
                submodule: 'common',
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
                submodule: 'common',
                controller: 'check-up'
            }
        },
        postPenataJasaMedicalRecord: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id',
            params: {
                module: 'api',
                submodule: 'common',
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
                submodule: 'common',
                controller: 'check-up',
                action: 'medical-record',                
            }
        },
        getLoketAntrianList: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
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
                submodule: 'common',
                controller: 'queues',
                action: 'update',
            }
        },
        getLoketRegisters: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'registers'
            }
        },
        getLoketRegistersCreate: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk_id',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'registers',
                action: 'create',
                kiosk_id: null
            }
        },
        createLoketRegisters: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'registers'
            }
        },
        editLoketTabahRujukan: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'registers'
            }
        },
        getLoketPendaftaranTambah: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:action/:kiosk_id',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pendaftaran',
                action: 'tambah',
                kiosk_id: null
            }
        },
        getLoketPendaftaranPoli: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pendaftaran',
                action: 'pilih-poli',
                id: null
            }
        },
        getLoketPendaftaranPatient: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'registers',
                action: 'select-patient'
            }
        },
        createLoketPendaftaranPatient: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pendaftaran',
                action: 'store'
            }
        },
        updateLoketPendaftaranPatient: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pendaftaran',
                action: 'store',
                id: null
            }
        },
        getLoketPendaftaranRujukan: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pendaftaran',
                action: 'tambah-rujukan',
                id: null
            }
        },
        createLoketPendaftaranRujukan: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pendaftaran',
                action: 'tambah-rujukan'
            }
        },
        getKasirPayments: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'payments',
            }
        },
        getKasirPaymentsCreate: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'payments',
            }
        },
        createKasirPayments: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'payments',
            }
        },
        getBatches: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'batches'
            }
        },
        getBuyers: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'batches'
            }
        },
        getDoctorServices: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
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
        getVisitorRawatInap: {
            method: 'GET',
            url: config.url + ':module/:submodule/:controller/:reg_type',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'visitors',
                reg_type:1
            }
        },
        getHospital: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'hospital'
            }
        },
        getICD: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'icd10'
            }
        },
        getInventories: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventories'
            }
        },
        getKiosks: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'kiosks'
            }
        },
        getMedicalRecords: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'medical-records'
            }
        },
        getPatiens: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'patiens'
            }
        },
        getPayments: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'payments'
            }
        },
        getPermissions: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'permissions'
            }
        },
        getPharmacySeller: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'pharmacy-seller'
            }
        },
        getPolies: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'polies'
            }
        },
        getRecipes: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'recipes'
            }
        },
        getReferences: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'add-references'
            }
        },
        getRegisters: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'registers'
            }
        },
        getRoles: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'roles'
            }
        },
        getServices: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'services'
            }
        },
        getSettings: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'settings'
            }
        },
        getStaff: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'staff'
            }
        },
        getStaffJobs: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'staff-jobs'
            }
        },
        getStaffPositions: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'staff-positions'
            }
        },
        getTuslahs: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'tuslahs'
            }
        },
        getUsers: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'users'
            }
        },
        getCheupInpatients: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'check-up-inpatient'
            }
        },
        postCheupInpatients: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'check-up-inpatient'
            }
        },
        getApotekRecipes: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'recipes',
                action: 'list'
            }
        },
        getApotekRecipesCreate: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'recipes',
            }
        },
        createApotekRecipes: {
            method: 'POST',
            url: config.url + ':module/:submodule/:controller/:action/:reference_id/:name_tuslah/:tuslah_amount/:amount/:price/:inventory',
            params: {
                module: 'api',
                submodule: 'common',
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
                submodule: 'common',
                controller: 'recipes',
                id: null
            }
        }
    });
});