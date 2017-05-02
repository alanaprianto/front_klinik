'use strict';

angular.module('adminApp')
    .controller('AntrianCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        $controller,
        ngDialog,
        moment,
        ServicesAdmin    
    ) {
        var initTemp = function () {
            $scope.today = new Date();
            $scope.temp = {};
            $scope.message = {};
        }
        
        angular.extend(this, $controller('ModalPendaftaranPasienCtrl', {$scope: $scope}));

        $scope.openModal = function (target, type, data) {       
            initTemp();
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            if (data) {
                $scope.dataOnModal = data;
                $scope.kiosk_id = data.id;                
            }

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal
            });
        }

        var tripleDigit = function(number) {
            if (number !== null && number !== undefined) {
                var str = "" + number;
                while (str.toString().length < 3) str = "0" + str;
                return str;
            }
        }

        var statusOnQueue = function (val) {
            if (val && val.status) {
                var result = '';
                $scope.statusQueue.forEach(function (item) {
                    if (val.status == item.value) {
                        result = item.key;
                    }
                });         
                return result;       
            }
        }

        var getLoketAntrianBpjs = function () {
            ServicesAdmin.getLoketAntrianList({type: 'bpjs'}).$promise
            .then(function (result) {
                var dataArray = [];
                result.datas.kiosks.forEach(function (item) {
                    item.displayedStatus = statusOnQueue(item);
                    item.displayedQueue = tripleDigit(item.queue_number);
                    dataArray.push(item);
                });
                $scope.antrianBpjs = dataArray;
            });
        }

        var getLoketAntrianUmum = function () {
            ServicesAdmin.getLoketAntrianList({type: 'umum'}).$promise
            .then(function (result) {
                var dataArray = [];
                result.datas.kiosks.forEach(function (item) {
                    item.displayedStatus = statusOnQueue(item);
                    item.displayedQueue = tripleDigit(item.queue_number);
                    dataArray.push(item);
                });
                $scope.antrianUmum = dataArray; 
            });
        }

        var getLoketAntrianContractor = function () {
            ServicesAdmin.getLoketAntrianList({type: 'contractor'}).$promise
            .then(function (result) {
                var dataArray = [];
                result.datas.kiosks.forEach(function (item) {
                    item.displayedStatus = statusOnQueue(item);
                    item.displayedQueue = tripleDigit(item.queue_number);
                    dataArray.push(item);
                });
                $scope.antrianContractor = dataArray; 
            });
        }

        var updateStatusToCalling = function (type, id) {
            var type = type;
            var params = {
                id: id
            }
            ServicesAdmin.updateLoketAntrianStatus(params).$promise
            .then(function (result) {
                switch (type) {
                    case "bpjs":
                        getLoketAntrianBpjs();
                        break;
                    case "umum":
                        getLoketAntrianUmum();
                        break;
                    case "contractor":
                        getLoketAntrianContractor();
                        break;
                }
            });
        }

        $scope.callQueue = function (type, queue, id) {
            var typeVoice = "Indonesian Female";
            var type = type;
            var queue = queue;
            var id = id;

            function panggilanLoket () {
                responsiveVoice.speak("Pasien " + type.toUpperCase() + " ke loket pendaftaran", typeVoice, {rate: 1});
            }
            function panggilanAntrian () {
                responsiveVoice.speak("'" + queue + "'", typeVoice, {rate: 0.75, volume: 1.5, onend: panggilanLoket});
            }
            
            responsiveVoice.speak("Nomor antrian ", typeVoice, {rate: 1, onend: panggilanAntrian});

            updateStatusToCalling(type, id);
        }

        var getDefaultValues = function() {
            $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.statusQueue = data.data.statusQueue;
                $scope.defaultValues = data.data;
            });
        };

        var firstInit = function () {
            initTemp();
            getDefaultValues();

            getLoketAntrianBpjs();
            getLoketAntrianUmum();
            getLoketAntrianContractor();

            $scope.getListPoli();
        }
        
        firstInit();
    });
