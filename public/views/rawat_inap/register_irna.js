'use strict';

angular.module('adminApp')
    .controller('RegisterIRNACtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        $controller,
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        moment
    ) {
        $scope.today = new Date();
        $scope.temp = {};
        $scope.message = {};

        angular.extend(this, $controller('ModalPendaftaranIrnaCtrl', {$scope: $scope}));

        var listDataPasien = function () {
            return ServicesAdmin.getVisitor().$promise
            .then(function (result) {
                var tempData=[];
                result.datas.patients.forEach(function(item,key){
                    tempData.push(item);
                });
                
                $scope.tableListPatients = tempData; 
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

        function webWorker () {
            listDataPasien()
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

            if (data) {
                $scope.dataOnModal = data;
                $scope.temp.patient = data;
            }            

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }
    });