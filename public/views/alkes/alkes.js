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
        var initTemp = function () {
            $scope.temp = {};
            $scope.temp.listTuslah = [];
            $scope.is_tuslah = 0;
        }

        var getSediaan = function (id) {
            var result = {'key':id,'value':id};
            $scope.defaultValues.sediaan.forEach(function (item) {
                if (item.value==id) {
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
                category = $scope.getCategory(data.inventory_category_id);
                $scope.dataOnModal.displaySediaan = sediaan.key;
                $scope.dataOnModal.displayCategory = category.name;
            }            

            if (type=="tambah") {
                $scope.titlecredAlkesModal = "Tambah Alkes";
                initTemp();
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
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }

        var getInventoryAlkes = function () {
            return ServicesCommon.getInventories({type: 'pharmacy'}).$promise.then(function (result) {
                $scope.tableListInventories = result.datas.inventories.data;
                $scope.tuslah = result.datas.inventories.data;
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
            initTemp();
        }
        
        firstInit();

        $scope.getCategory = function (id) {
            var result = {'key':id,'value':id};
            $scope.listCategories.forEach(function (item) {
                if (item.id==id) {
                    result = item;
                }
            });
            return result;
        }

        $scope.createnewAlkes = function () {
            var tuslah_ids = [];            

            $scope.temp.listTuslah.forEach(function (val) {
                tuslah_ids.push(val.tuslah_code);
            });

            $scope.message = {};
            var param = {
                code: $scope.temp.code,
                name: $scope.temp.name,
                type: $scope.temp.type,
                explain: $scope.temp.explain,
                sediaan: $scope.temp.sediaan.value,
                inventory_category_id: $scope.temp.category.id,
                inventory_tuslah_id: tuslah_ids
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

        $scope.addTuslah = function () {
            var countTuslah = $scope.temp.listTuslah.length;
            if (!$scope.tuslah[countTuslah]) {
                return;
            }

            var initCode = $scope.tuslah[countTuslah].id;
            var initAmount = 1;

            var addService = {
                tuslah_code: initCode,
                tuslah_amount: initAmount
            };

            $scope.temp.listTuslah.push(addService);
        }

        $scope.setTuslah = function (idx) {
            var result = {};
            $scope.tuslah.forEach(function (item) {
                if (item.id == $scope.temp.listTuslah[idx].tuslah_code) {
                    $scope.temp.listTuslah[idx].tuslah_sediaan = getSediaan(item.sediaan).key;
                    return result = item;
                };
            });

            $scope.temp.listTuslah[idx].tuslah_amount = result.tuslah_amount;
        }

        $scope.removeTuslah = function (idx) {
            $scope.temp.listTuslah.splice(idx, 1);
        }
    });