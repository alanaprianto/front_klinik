'use strict';

angular.module('adminApp')
    .factory('ServicesCommon', function($resource, config) {
    return $resource(config.url + ':module/:submodule/:controller/:action/:id', {
        id: '@_id'
    }, {
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
                controller: 'buyers'
            }
        },
        getProvinces: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'provinces'
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
                controller: 'references'
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
        }
    });
});