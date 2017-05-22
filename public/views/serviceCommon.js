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
        getCities: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'cities'
            }
        },
        getDistricts: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'districts'
            }
        },
        getSubDistricts: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'subdistricts'
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
        getInventoryCategories: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventory-categories'
            }
        },
        createInventoryCategories: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventory-categories'
            }
        },
        deleteInventoryCategories: {
            method: 'DELETE',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventory-categories'
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
        postRoles: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'roles'
            }
        },
        deleteRoles: {
            method: 'DELETE',
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
        createServices: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'services'
            }
        },
        deleteServices: {
            method: 'DELETE',
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
                controller:'staff'
            }
        },
        createStaff: {
            method: 'POST',
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
        createStaffJob: {
            method: 'POST',
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
        createStaffPositions: {
            method: 'POST',
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
        getCategoryService: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'category-services'
            }
        },
        createCategoryService: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'category-services'
            }
        },
        deleteCategoryService: {
            method: 'DELETE',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'category-services'
            }
        },
        getDistributors: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'distributors'
            }
        },
        getInventoryCategory: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventory-categories'
            }
        },
        createupdateDistributor: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'distributors'
            }
        },
        deleteDistributor: {
            method: 'DELETE',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'distributors'
            }
        },
        createupdateAlkes: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventories'
            }
        },
        deleteAlkes: {
            method: 'DELETE',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'inventories'
            }
        },
        getListPembelian: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'transactions'
            }
        },
        createupdatePO: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'transactions'
            }  
        },
        getDepo: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'depo'
            }  
        },
        postDepo: {
            method: 'POST',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'depo'
            }  
        },
        deleteDepo: {
            method: 'DELETE',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'depo'
            }
        },
        getDepoInventory: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'depo-inventory'
            }
        },
        getClassRoom: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'class-rooms'
            }
        },
        getRoom: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'rooms'
            }
        },
        getBed: {
            method: 'GET',
            params: {
                module: 'api',
                submodule: 'common',
                controller: 'beds'
            }
        }
    });
});