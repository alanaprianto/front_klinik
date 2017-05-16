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
        $scope.openModal = function (target, type, data) {
            var cssModal = '';            
            // var sediaan = {};
            // var category = {};
            if (data) {
                $scope.dataOnModal = data;                
                // sediaan = getSediaan(data.sediaan);
                // category = getCategory(data.inventory_category_id);
                // $scope.dataOnModal.displaySediaan = sediaan.key;
                // $scope.dataOnModal.displayCategory = category.name;
            }            

            if (type=="tambah") {
                cssModal = 'modal-lg';
                // $scope.titlecredAlkesModal = "Tambah Alkes";
                // initTemp();
            } else {
                // $scope.temp.id = data.id;
                // $scope.temp.code = data.code;
                // $scope.temp.name = data.name;
                // $scope.temp.type = data.type;
                // $scope.temp.explain = data.explain;
                // $scope.temp.sediaan = sediaan;
                // $scope.temp.category = category;
                // $scope.titlecredAlkesModal = "Edit Alkes";
            }
            $scope.typecredPO = type;
            // $scope.temp.type = 'pharmacy';

            listDistributor();
            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }

        var listDistributor = function () {
            return ServicesCommon.getDistributors().$promise
            .then(function (result) {
                var tempData = [];
                result.datas.distributors.forEach(function (item, key) {
                    tempData.push(item);
                });
                $scope.distributors = tempData;
            });
        }

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