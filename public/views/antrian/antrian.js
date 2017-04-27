'use strict';

angular.module('adminApp')
    .controller('AntrianCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog,
        moment,
        ServicesAdmin
    ) {
        var tripleDigit = function(number) {
            if (number !== null && number !== undefined) {
                var str = "" + number;
                while (str.toString().length < 3) str = "0" + str;
                return str;
            }
        }

        var statusOnQueue = function (val) {
            if (val && val.status) {
                switch (val.status) {
                    case 1: 
                        return "open";
                        break;
                    case 2: 
                        return "calling";
                        break;
                    case 3: 
                        return "On proses";
                        break;
                    case 4: 
                        return "closed";
                        break;
                }
                return 
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

        var firstInit = function () {
            getLoketAntrianBpjs();
            getLoketAntrianUmum();
            getLoketAntrianContractor();
        }
        
        firstInit();

        $scope.openModal = function (target, type, data) {
            console.log('open modal');
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            if (data) {
                $scope.dataOnModal = data;
            }

            getDataOnModalOpen(target);

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal
            });
        }

        var getDataOnModalOpen = function (target) {
            switch(target) {
                case 'tambahPasienBaruModal':

                    break;
                default:
                    
            }
        }
    });
