'use strict';

angular.module('adminApp')
    .controller('InfoBedCtrl', function(
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

        var getInfoBed = function () {
            return ServicesCommon.getInfoBed().$promise
            .then(function (result) {
                var infoBeds = [];
                result.datas.rooms.forEach(function (item, key) {
                    var room_id = item.id;
                    var room_name = item.name;
                    var room_class = item.class_room.display_name;

                    item.beds.forEach(function (item, key) {
                        var available = "Terisi";
                        if (item.available) {
                            available = "Kosong";
                        }
                        var data = {
                            bed_name: item.display_name,
                            bed_available: item.available,
                            bed_display_avail: available,
                            bed_patient: item.patient_id,
                            room_id: room_id,
                            room_name: room_name,
                            room_class: room_class
                        }
                        infoBeds.push(data);
                    });
                });                
                $scope.tableListInfoBeds = infoBeds;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.defaultValues = data.data;
            });
        }

        function webWorker () {
            getInfoBed()
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
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
                $scope.oldPatient(data);
            }

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }
    });