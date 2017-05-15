'use strict';

angular.module('adminApp')
    .controller('CategoriServiceCtrl', function(
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
            return ServicesCommon.getCategoryService({id: data.id}).$promise
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
                $scope.titlecredCategoriServiceModal = "Tambah Kategori Tindakan";
            } else {
                $scope.temp.id = data.id;
                $scope.temp.namadist = data.name;
                $scope.temp.display_namedist = data.display_name;
                $scope.temp.descdist = data.desc;
                $scope.titlecredCategoriServiceModal = "Edit Kategori Tindakan";
            }
            $scope.typecredCategoriService = type;

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

        var ListCategoryService = function () {
            return ServicesCommon.getCategoryService().$promise
            .then(function (result) {
                console.log(result);
                var tempData = [];
                result.datas.categoryServices.forEach(function (item, key) {
                    tempData.push(item);
                });
                $scope.tableListCategoryService = tempData;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }

        function webWorker () {
            ListCategoryService()
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
        }

        firstInit();

        $scope.createnewcategoryService = function () {            
            $scope.message = {};
            var param = {
                name: $scope.temp.namadist,
                desc: $scope.temp.descdist,
                display_name:$scope.temp.display_namedist,
                }
              

            ServicesCommon.createCategoryService(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                ListCategoryService();
            });
        }

        $scope.deletecategoryService = function (id) {
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

                    ServicesCommon.deletecategoryService({id: id}).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        ListCategoryService();
                    });
                }
            });            
        }

        $scope.updatecategoryService = function () {
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
                        display_name:$scope.temp.display_namedist,
                    }

                    ServicesCommon.updateCategoryService(param).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        ListCategoryService();
                    });
                }
            }); 
        }
    });

