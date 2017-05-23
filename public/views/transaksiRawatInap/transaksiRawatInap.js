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
        moment
    ) {
        var initTemp = function () {
            $scope.today = new Date();
            $scope.temp = {};
            $scope.message = {};
        }


        var listTransaksiRawatInap = function () {
            return ServicesAdmin.getVisitor().$promise
            .then(function (result) {
                var tempData=[];
                result.datas.patients.forEach(function(item,key){
                    tempData.push(item);
                    switch (item.gender) {
                    case 1:
                        item.displayedGender = 'Laki-laki';
                        break;
                    case 2:
                        item.displayedGender = 'Perempuan';
                        break;
                    }

                });
                result.datas.beds;
                result.datas.room;
                result.datas.class_rooms;



                $scope.tablelistTransaksiRawatInap = tempData; 
            });           
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }       

        var getClassRoom = function () {
            return ServicesCommon.getClassRoom().$promise.then(function (result) {
                $scope.class_rooms = result.datas.class_rooms;
            });
        }

        var getRoom = function () {
            return ServicesCommon.getRoom().$promise.then(function (result) {
                $scope.room = result.datas.room;
            });
        }
         var getBed = function () {
            return ServicesCommon.getBed().$promise.then(function (result) {
                $scope.bed = result.datas.beds;
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

            getClassRoom();
        }
        
        firstInit();

        $scope.openModal = function (target, type, data) {
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            initTemp();
            if (data) {
                $scope.dataOnModal = data;
                
            }

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }        
    });