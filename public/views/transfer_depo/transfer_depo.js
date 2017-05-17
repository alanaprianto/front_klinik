'use strict';

angular.module('adminApp')
    .controller('TransferDepoCtrl', function(
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
            $scope.temp.listTrDepos = [];
            $scope.temp.tax = 0;
            $scope.temp.shipping = 0;
            $scope.temp.other = 0;
        }

        $scope.openModal = function (target, type, data) {
            var cssModal = 'modal-lg';            
            if (data) {
                $scope.dataOnModal = data;                
            }            

            initTemp();
            if (type=="tambah") {
                $scope.temp.titleCrEdTrDepo = "Transfer Depo";                
            } else {
                $scope.temp.titleCrEdTrDepo = "Edit Transfer Depo";                
            }
            $scope.temp.typecredTrDepo = type;            

            listDepo();
            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }

        var listDepo = function () {
            return ServicesCommon.getDepo().$promise
            .then(function (result) {                
                var tempData = [];
                result.datas.depos.forEach(function (item, key) {
                    tempData.push(item);
                });
                $scope.listDepoSrc = tempData;
            });
        }        

        var getListTrDepos = function () {
            return ServicesCommon.getListPembelian({type:2}).$promise.then(function (result) {
                $scope.tableListPOs = result.datas.transactions.data;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
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

        var getDepoInventory = function (depoId) {            
            return ServicesCommon.getDepoInventory({depo_id:depoId}).$promise.then(function (result) {                
                $scope.trDepos = result.datas.inventories;                
            });
        }

        function webWorker () {
            getListTrDepos()            
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
            
            initTemp();
        }

        firstInit();

        $scope.selectSrc = function () {
            getDepoInventory($scope.temp.depo_src.id);
            $scope.temp.listTrDepos = [];
            
            $scope.excludeDst();
        }

        $scope.excludeDst = function () {
            // console.log($scope.temp.depo_src);
            // console.log($scope.listDepoSrc[0]);

            $scope.listDepoDst = $scope.listDepoSrc;
            var index = $scope.listDepoDst.indexOf($scope.temp.depo_src);
            // console.log(index);

            $scope.listDepoDst.splice(index, 0);
        }

        $scope.addTrDepo = function () {
            var countTrDepo = $scope.temp.listTrDepos.length;
            if (!$scope.trDepos[countTrDepo]) {
                console.log("return");
                return;
            }

            var initName = $scope.trDepos[countTrDepo].name;
            var initDesc = $scope.trDepos[countTrDepo].explain;
            var initStok = $scope.trDepos[countTrDepo].stocks[0].stock;
            var initQty = 1;

            var addTrDepo = {
                trd_name: initName,
                trd_desc: initDesc,
                trd_stock: initStok,
                trd_qty: initQty
            };

            console.log(addTrDepo);
            $scope.temp.listTrDepos.push(addTrDepo);

        }
    });