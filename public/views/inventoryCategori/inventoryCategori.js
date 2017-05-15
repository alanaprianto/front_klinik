'use strict';

angular.module('adminApp')
    .controller('IventroyCategoriCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        $controller,
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        SweetAlert,
        moment
    ) {
        $scope.temp = {};        

        var getDataOnModalOpen = function (data) {            
            return ServicesCommon.getInventoryCategories({id: data.id}).$promise
            .then(function (result) {
                console.log(result);
            });
        }

        $scope.openModal = function (target, type, data) {
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            if (data) {
                $scope.dataOnModal = data;
            }

            if (type=="tambah") {
                $scope.titlecredInventoryCategoriModal = "Tambah Inventory Categori";
            } else {
                $scope.temp.id = data.id;
                $scope.temp.namadist = data.name;
                $scope.temp.descdist = data.desc;
                $scope.titlecredInventoryCategoriModal = "Edit Inventory Categori";
            }
            $scope.typecredInventoryCategori = type;

            ngDialog.open({
            template: target,
            scope: $scope,
            className: 'ngDialog-modal ' + cssModal});
            // if (target=="createDistributorModal") {
            //     ngDialog.open({
            //     template: target,
            //     scope: $scope,
            //     className: 'ngDialog-modal ' + cssModal});
            // } else {
            //     getDataOnModalOpen(data)
            //     .then(
            //         ngDialog.open({
            //         template: target,
            //         scope: $scope,
            //         className: 'ngDialog-modal ' + cssModal
            //     }));
            // }            
        }

        var ListInventoryCategories = function () {
            return ServicesCommon.getInventoryCategories().$promise
            .then(function (result) {
                console.log(result);
                var tempData = [];
                result.datas.inventory_categories.forEach(function (item, key) {
                    tempData.push(item);
                });
                $scope.tableListInventoryCategories = tempData;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }

        function webWorker () {
            ListInventoryCategories()
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
        }

        firstInit();

        $scope.createnewInventoryCategories = function () {            
            $scope.message = {};
            var param = {
                name: $scope.temp.namadist,
                desc: $scope.temp.descdist,
            }

            ServicesCommon.createInventoryCategories(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                ListInventoryCategories();
            });
        }

        $scope.deleteInventoryCategories = function (id) {
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

                    ServicesCommon.deleteInventoryCategories({id: id}).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        ListInventoryCategories();
                    });
                }
            });            
        }

        $scope.updateInventoryCategories = function () {
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
                    console.log($scope.temp);
                    $scope.message = {};
                    var param = {
                        id: $scope.temp.id,
                        name: $scope.temp.namadist,
                        desc: $scope.temp.descdist,
                        phone: $scope.temp.telpondist,
                    }

                    ServicesCommon.updateInventoryCategories(param).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        ListInventoryCategories();
                    });
                }
            }); 
        }
    });

