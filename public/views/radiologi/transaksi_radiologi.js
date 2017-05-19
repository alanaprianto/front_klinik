'use strict';

angular.module('adminApp')
    .controller('TransaksiRadiologiCtrl', function(
        $scope,
        $http,
        $rootScope,
        ngDialog,
        ServicesAdmin,
        ServicesCommon,
        SweetAlert,
        $filter
    ){
        var initTemp = function () {
            $scope.temp = {};
            $scope.temp.listServices = [];            
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }        

        var listServices = function () {
            return ServicesCommon.getServices().$promise
            .then(function (result) {
                $scope.services = result.datas.services;
            });
        }

        function webWorker () {
            // getListPembelian()
            // .then(function () {
            //     setTimeout(webWorker, 5000);
            // })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
            
            initTemp();
            listServices();
        }

        firstInit();

        $scope.openModal = function (target, type, data) {
            var cssModal = 'modal-lg';
            
            if (data) {
                $scope.dataOnModal = data;
            }

            // initTemp();
            if (type=="tambah") {
                $scope.temp.titlePembayaran = "Pembayaran";
            } else {
                $scope.temp.titlePembayaran = "";
            }
            $scope.temp.typecredPO = type;
            
            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }
        
        $scope.addService = function () {
            var countService = $scope.temp.listServices.length;
            if (!$scope.services[countService]) {
                return;
            }

            var initAmount = 1;
            var initCost = $scope.services[countService].cost;
            var initID = $scope.services[countService].id;

            var addService = {
                cost: initCost,
                service_id: initID,
                service_amount: initAmount,
                service_total: initAmount * initCost
            };

            $scope.temp.listServices.push(addService);
        }

        $scope.removeService = function (idx) {
            $scope.temp.listServices.splice(idx, 1);
        }

        $scope.setSubTotal = function (idx) {
            $scope.temp.listServices[idx].service_total = $scope.temp.listServices[idx].service_amount * $scope.temp.listServices[idx].cost;
        }

         $scope.setTotal = function () {
            var total = 0;
            for(var i = 0; i < $scope.temp.listServices.length; i++){
                var product = $scope.temp.listServices[i];
                total += product.service_total;
            }
            $scope.temp.totalPayment = total;
            return total;
        }
    });