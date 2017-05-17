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
        var initTemp = function () {
            $scope.temp = {};
            $scope.temp.listPO = [];
            $scope.temp.tax = 0;
            $scope.temp.shipping = 0;
            $scope.temp.other = 0;
        }

        $scope.openModal = function (target, type, data) {
            var cssModal = 'modal-lg';            
            // var sediaan = {};
            // var category = {};
            if (data) {
                $scope.dataOnModal = data;                
                // sediaan = getSediaan(data.sediaan);
                // category = getCategory(data.inventory_category_id);
                // $scope.dataOnModal.displaySediaan = sediaan.key;
                // $scope.dataOnModal.displayCategory = category.name;
            }            

            initTemp();
            if (type=="tambah") {
                $scope.temp.titleCrEdPO = "Tambah PO";                
            } else {
                $scope.temp.titleCrEdPO = "Receive Order (No. PO: "+data.number_transaction+")";
                $scope.temp.vendor = data.distributor;
                data.item_orders.forEach(function (item) {
                    var addPO = {
                        po_item_id: item.inventory_id,
                        po_desc: "",
                        po_qty: item.amount,
                        po_unit: item.unit,
                        po_price: item.price,
                        po_total: item.total
                    };

                    $scope.temp.listPO.push(addPO);
                });

                $scope.setSubTotal();
            }
            $scope.temp.typecredPO = type;
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

        var getInventoryAlkes = function () {
            return ServicesCommon.getInventories({type: 'pharmacy'}).$promise.then(function (result) {        
                $scope.purchaseodr = result.datas.inventories.data;
            });
        }

        var getListPembelian = function () {
            return ServicesCommon.getListPembelian({type:1}).$promise.then(function (result) {                
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

        function webWorker () {
            getListPembelian()
            .then(getInventoryAlkes)
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);

            // getCategoryId();
            initTemp();
        }

        firstInit();

        $scope.createnewPO = function () {
            var data = [];

            $scope.temp.listPO.forEach(function (val) {
                var temp = {
                    inventory_id: val.po_item_id,
                    amount: val.po_qty,
                    unit: val.po_unit,
                    price: val.po_price,
                    total: val.po_total
                };
                data.push(temp);
            });

            $scope.message = {};
            var param = {
                type: "1",
                data: data,
                distributor_id: $scope.temp.vendor.id
            }
                // price: $scope.temp.price,
            ServicesCommon.createupdatePO(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                getListPembelian();
            });
        }

        $scope.createRO = function () {
            var data = [];

            $scope.temp.listPO.forEach(function (val) {
                var temp = {
                    inventory_id: val.po_item_id,
                    amount: val.po_qty,
                    unit: val.po_unit,
                    price: val.po_price,
                    total: val.po_total
                };
                data.push(temp);
            });

            $scope.message = {};
            var param = {
                type: "4",
                number_transaction: $scope.dataOnModal.number_transaction,
                data: data,
                distributor_id: $scope.temp.vendor.id
            }
                // price: $scope.temp.price,
            ServicesCommon.createupdatePO(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                getListPembelian();
            });
        }

        $scope.addPO = function () {
            var countPO = $scope.temp.listPO.length;
            if (!$scope.purchaseodr[countPO]) {
                return;
            }

            var initCode = $scope.purchaseodr[countPO].id;
            var initAmount = 1;
            var initDesc = $scope.purchaseodr[countPO].explain;
            var initUnit = getSediaan($scope.purchaseodr[countPO].sediaan).key;
            var initPrice = $scope.purchaseodr[countPO].purchase_price;

            var addPO = {
                po_item_id: initCode,
                po_desc: initDesc,
                po_qty: initAmount,
                po_unit: initUnit,
                po_price: initPrice,
                po_total: initAmount*initPrice
            };

            $scope.temp.listPO.push(addPO);
            $scope.setSubTotal();
        }

        $scope.setPO = function (idx) {
            var result = {};
            $scope.purchaseodr.forEach(function (item) {
                if (item.id == $scope.temp.listPO[idx].po_item_id) {
                    $scope.temp.listPO[idx].po_desc = item.explain;
                    $scope.temp.listPO[idx].po_desc = item.explain;
                    $scope.temp.listPO[idx].po_unit = getSediaan(item.sediaan).key;
                    $scope.temp.listPO[idx].po_price = item.purchase_price;
                    $scope.setTotalPO(idx);
                    return result = item;
                };
            });
        }

        $scope.setTotalPO = function (idx) {            
            $scope.temp.listPO[idx].po_total = $scope.temp.listPO[idx].po_price * $scope.temp.listPO[idx].po_qty;            

            $scope.setSubTotal();
        }

        $scope.setSubTotal = function () {
            $scope.temp.subtotal = 0;
            $scope.temp.listPO.forEach(function (item) {
                $scope.temp.subtotal += item.po_total;
            });

            $scope.setGrandTotals();
        }

        $scope.setGrandTotals = function () {
            $scope.temp.total = $scope.temp.subtotal*1+$scope.temp.tax*1+$scope.temp.shipping*1+$scope.temp.other*1;
        }

        $scope.removePO = function (idx) {
            $scope.temp.listPO.splice(idx, 1);
        }

    });