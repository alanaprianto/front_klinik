'use strict';

angular.module('adminApp')
    .controller('TransaksiRawatInapCtrl', function(
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
            return ServicesCommon.getDistributors({id: data.id}).$promise
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
                $scope.titlecredTransaksiRawatInapModal = "Tambah Transaksi Rawat Inap";
            } else {
                $scope.temp.id = data.id;
                $scope.temp.namadist = data.name;
                $scope.temp.alamatdist = data.address;
                $scope.temp.telpondist = data.phone;
                $scope.titlecredTransaksiRawatInapModal = "Edit Transaksi Rawat Inap";
            }
            $scope.typecredTransaksiRawatInap = type;

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

        var listTransaksiRawatInap = function () {
            return ServicesCommon.getDistributors().$promise
            .then(function (result) {
                var tempData = [];
                result.datas.distributors.forEach(function (item, key) {
                    tempData.push(item);
                });
                $scope.tableListDistributor = tempData;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }

        function webWorker () {
            listTransaksiRawatInap()
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
        }

        firstInit();

        $scope.createnewTransaksiRawatInap = function () {            
            $scope.message = {};
            var param = {
                name: $scope.temp.namadist,
                address: $scope.temp.alamatdist,
                phone: $scope.temp.telpondist,
            }

            ServicesCommon.createupdateTransaksiRawatInap(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                listTransaksiRawatInap();
            });
        }

        $scope.deleteTransaksiRawatInap = function (id) {
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

                    ServicesCommon.deleteTransaksiRawatInap({id: id}).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        listTransaksiRawatInap();
                    });
                }
            });
        }

        $scope.updateTransaksiRawatInap = function () {
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
                        distributor_id: $scope.temp.id,
                        name: $scope.temp.namadist,
                        address: $scope.temp.alamatdist,
                        phone: $scope.temp.telpondist,
                    }

                    ServicesCommon.createupdateTransaksiRawatInap(param).$promise
                    .then(function (result) {
                        if (!result.isSuccess) {
                            return $scope.message.error = result.message;
                        };

                        ngDialog.closeAll();
                        listTransaksiRawatInap();
                    });
                }
            }); 
        }
    });