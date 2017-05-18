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
                $scope.temp.titleCrEdTrDepo = "Detail Transfer Depo";
                data.item_orders.forEach(function (item) {
                    var addTrDepo = {
                        trd_id: item.id,
                        trd_unit: item.unit,
                        trd_price: item.price,
                        trd_name: item.name,
                        trd_desc: item.explain,
                        trd_stock: item.stock,
                        trd_qty: item.amount
                    };

                    $scope.temp.listTrDepos.push(addTrDepo);
                });
                $scope.temp.depo_src = $scope.getDepoObj(data.from_depo_id);
                $scope.temp.depo_dest = $scope.getDepoObj(data.to_depo_id);
            }
            $scope.temp.typecredTrDepo = type;            
            
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
                $scope.listDepos = tempData;
            });
        }        

        $scope.getDepoObj = function(id) {
            var depo = {};
            $scope.listDepos.forEach(function (item) {
                if (item.id==id) {
                    depo = item;
                }
            });
            return depo;
        }

        var getListTrDepos = function () {
            return ServicesCommon.getListPembelian({type:2}).$promise.then(function (result) {
                $scope.tableListTrDepos = result.datas.transactions.data;
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
            listDepo();
        }

        firstInit();

        $scope.createTrDepo = function () {
            var data = [];

            $scope.temp.listTrDepos.forEach(function (val) {
                var temp = {
                    inventory_id: val.trd_id,
                    amount: val.trd_qty,
                    unit: val.trd_unit,
                    price: val.trd_price                    
                };
                data.push(temp);
            });

            $scope.message = {};
            var param = {
                type: "2",
                data: data,
                from_depo_id: $scope.temp.depo_src.id,
                to_depo_id: $scope.temp.depo_dest.id
            }
                // price: $scope.temp.price,
            ServicesCommon.createupdatePO(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                getListTrDepos();
            });
        }

        $scope.selectSrc = function () {
            getDepoInventory($scope.temp.depo_src.id);
            $scope.temp.listTrDepos = [];            
        }        

        $scope.addTrDepo = function () {
            var countTrDepo = $scope.temp.listTrDepos.length;
            if (!$scope.trDepos[countTrDepo]) {
                console.log("return");
                return;
            }

            var initId = $scope.trDepos[countTrDepo].id;
            var initUnit = getSediaan($scope.trDepos[countTrDepo].sediaan).key;
            var initPrice = $scope.trDepos[countTrDepo].purchase_price;

            var initName = $scope.trDepos[countTrDepo].name;
            var initDesc = $scope.trDepos[countTrDepo].explain;
            var initStok = $scope.trDepos[countTrDepo].stocks[0].stock;
            var initQty = 1;

            var addTrDepo = {
                trd_id: initId,
                trd_unit: initUnit,
                trd_price: initPrice,
                trd_name: initName,
                trd_desc: initDesc,
                trd_stock: initStok,
                trd_qty: initQty
            };

            $scope.temp.listTrDepos.push(addTrDepo);
        }
    });