'use strict';

angular.module('adminApp')
    .controller('PenjualanAlkesCtrl', function(
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
            $scope.temp.listItems = [];            
        }

        var getInventoryAlkes = function () {
            return ServicesCommon.getInventories({type: 'pharmacy'}).$promise.then(function (result) {
                var items = [];
                angular.forEach(result.datas.inventories.data, function (val) {
                    var profit = val.profit;
                    if (val.is_percentage) {
                        profit = (val.profit/100) * val.purchase_price;
                    }
                    val.sell_price = val.purchase_price + profit;

                    items.push(val);
                })

                $scope.inventories = items;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
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
            getInventoryAlkes();            
        }

        firstInit();

        $scope.addItem = function (item) {
            var check = false;
            angular.forEach($scope.temp.listItems, function (val, key) {
                if (val.id == item.id) {
                    check = true;
                    $scope.temp.listItems[key].qty = $scope.temp.listItems[key].qty + 1;
                    $scope.temp.listItems[key].sub_total = $scope.temp.listItems[key].qty * $scope.temp.listItems[key].sell_price;
                    $scope.temp.totaltagihan += $scope.temp.listItems[key].sub_total;
                }
            });

            if (check) {
                return;
            }

            item.qty = 1;
            $scope.temp.listItems.push(item);
        }        

        $scope.setTotal = function () {
            var total = 0;
            for(var i = 0; i < $scope.temp.listItems.length; i++){
                var product = $scope.temp.listItems[i];
                total += product.sub_total;
            }
            $scope.temp.totalPayment = total;
            return total;
        }

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

        $scope.countPayments = function () {                    
            $scope.temp.diff = $filter('currency')($scope.temp.payment - $scope.temp.totalPayment);            
        }

        $scope.createPOS = function () {
            var data = [];

            $scope.temp.listItems.forEach(function (val) {
                var temp = {
                    inventory_id: val.id,
                    amount: val.qty,
                    unit: val.sediaan,
                    price: val.sell_price,
                    total: val.sub_total
                };
                data.push(temp);
            });

            console.log(data);
            $scope.message = {};
            var param = {
                type: "3",
                data: data,
                name: "Cari Pelanggan",
                phone: "082321021294"
            }
                // price: $scope.temp.price,
            ServicesCommon.createupdatePO(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();                
            });
        }
    });