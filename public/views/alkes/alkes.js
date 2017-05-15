'use strict';

angular.module('adminApp')
    .controller('AlkesCtrl', function(
        $scope,
        $http,
        $rootScope,
        ngDialog,
        ServicesAdmin,
        ServicesCommon,
        SweetAlert
    ){
        $scope.temp = {};

        var getSediaan = function (id) {            
            var result = {};
            $scope.defaultValues.sediaan.forEach(function (item) {                
                if (item.value==id) {                    
                    result = item;                    
                }                
            });
            return result;
        }

        var getCategory = function (id) {                    
            var result = {};            
            $scope.listCategories.forEach(function (item) {                
                if (item.id==id) {
                    result = item;                    
                }
            });
            return result;
        }

        var getCategoryId = function () {
            return ServicesCommon.getInventoryCategory().$promise.then(function (result) {                
                $scope.listCategories = result.datas.inventory_categories;                
            });
        }

        $scope.openModal = function (target, type, data) {
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            var sediaan = {};
            var category = {};
            if (data) {
                $scope.dataOnModal = data;
                sediaan = getSediaan(data.sediaan);
                category = getCategory(data.inventory_category_id);
                $scope.dataOnModal.displaySediaan = sediaan.key;
                $scope.dataOnModal.displayCategory = category.name;
            }            

            if (type=="tambah") {
                $scope.titlecredAlkesModal = "Tambah Alkes";
                $scope.temp = {};
            } else {
                $scope.temp.id = data.id;
                $scope.temp.code = data.code;
                $scope.temp.name = data.name;
                $scope.temp.type = data.type;
                $scope.temp.explain = data.explain;
                $scope.temp.sediaan = sediaan;
                $scope.temp.category = category;
                $scope.titlecredAlkesModal = "Edit Alkes";
            }
            $scope.typecredAlkes = type;
            $scope.temp.type = 'pharmacy';        

            ngDialog.open({
            template: target,
            scope: $scope,
            className: 'ngDialog-modal ' + cssModal});
        }

        var getInventoryAlkes = function () {
            return ServicesCommon.getInventories({type: 'pharmacy'}).$promise.then(function (result) {
                $scope.tableListInventories = result.datas.inventories.data;                
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });            
        }

        function webWorker () {
            getInventoryAlkes()            
            .then(function () {
                setTimeout(webWorker, 5000);
            })            
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);

            getCategoryId();
        }
        
        firstInit();

        $scope.createnewAlkes = function () {
            $scope.message = {};
            var param = {
                code: $scope.temp.code,
                name: $scope.temp.name,
                type: $scope.temp.type,
                explain: $scope.temp.explain,
                sediaan: $scope.temp.sediaan.value,
                inventory_category_id: $scope.temp.category.id,
            }
                // price: $scope.temp.price,

            ServicesCommon.createupdateAlkes(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                getInventoryAlkes();
            });
        }

        $scope.deleteAlkes = function (id) {
            SweetAlert.swal({
               title: "Konfirmasi?",
               text: "Anda yakin akan delete Data ini?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               closeOnConfirm: true
           }, function(isConfirm){ 
                if (isConfirm) {
                    $scope.message = {};

                    ServicesCommon.deleteAlkes({id: id}).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        getInventoryAlkes();
                    });
                }
            });
        }        

        $scope.updateAlkes = function () {
            SweetAlert.swal({
               title: "Konfirmasi?",
               text: "Anda yakin akan update Data ini?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               closeOnConfirm: true
           }, function(isConfirm){ 
                if (isConfirm) {                    
                    $scope.message = {};
                    var param = {
                        inventory_id: $scope.temp.id,
                        code: $scope.temp.code,
                        name: $scope.temp.name,
                        type: $scope.temp.type,
                        explain: $scope.temp.explain,
                        sediaan: $scope.temp.sediaan.value,
                        inventory_category_id: $scope.temp.category.id,
                    }

                    ServicesCommon.createupdateAlkes(param).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        getInventoryAlkes();
                    });
                }
            }); 
        }        
    });
