'use strict';

angular.module('adminApp')
    .controller('PembelianAlkesCtrl', function(
        $scope,
        $http,
        $rootScope,
        ngDialog,
        ServicesAdmin,
        ServicesCommon,
        SweetAlert
    ){
        var getListPembelian = function () {
            return ServicesCommon.getListPembelian({type:1}).$promise.then(function (result) {
                console.log(result);
                // $scope.listPembelian = result.datas.inventories.data;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }
        
        function webWorker () {
            getListPembelian()
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);

            // getCategoryId();
            // initTemp();
        }
        
        firstInit();            
    });