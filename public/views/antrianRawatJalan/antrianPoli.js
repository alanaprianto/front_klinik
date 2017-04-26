'use strict';

angular.module('adminApp')
    .controller('AntrianCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog,
        moment,
        ServicesAdmin,
        ServicesCommon
    ) {
        $scope.temp = {};
        $scope.temp.startDate = new Date();

        var toTitleCase = function (str) {
            return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        }

        var genderToString = function (val) {
            if (val !== null && val !== undefined) {
                var result = "";
                switch (val) {
                    case 1: 
                        result = "Laki-Laki";
                        break;
                    case 2:
                        result = "Perempuan";
                        break;
                }
                return result;
            }
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

        $scope.getDoctor = function () {
            $scope.listPoli.forEach(function(item) {
                if (item.id == $scope.temp.poly_id && item.doctors) {
                    $scope.listDoctor = item.doctors;
                }
            });
        }

        var listPoli = function () {
            return ServicesCommon.getPolies().$promise
            .then(function (result) {
                var dataDoctor = [];
                $scope.listPoli = result.datas.polies;

                if (result.datas && result.datas.polies) {
                    result.datas.polies.forEach(function (val) {
                        if (val.doctors) {
                            val.doctors.forEach(function (item) {
                                dataDoctor.push(item);
                            });
                        }
                    });
                    $scope.listAllDoctor = dataDoctor;
                }
            });
        }

        var getDoctorName = function (staffID) {
            var result = "";
            $scope.listAllDoctor.forEach(function (val) {
                if (val.pivot && val.pivot.staff_id && val.pivot.staff_id == staffID) {
                    result = val.full_name;
                    return;
                }
            });
            return result;
        }

        var getLoketAntrianPoli = function () {
            ServicesAdmin.getLoketAntrianList({type: $scope.poliType}).$promise
            .then(function (result) {
                var dataArray = [];
                result.datas.kiosks.forEach(function (item) {
                    item.displayedStatus = statusOnQueue(item);
                    item.displayedQueue = tripleDigit(item.queue_number);
                    if (item.reference && item.reference.register && item.reference.register.patient) {
                        item.displayedAge = moment().diff(item.reference.register.patient.birth, 'years');
                        item.displayedBirth = moment(item.reference.register.patient.birth).format('DD MMMM YYYY');
                        item.displayedGender = genderToString(item.reference.register.patient.gender);
                    }
                    if (item.reference) {
                        item.displayedDoctor = getDoctorName(item.reference.staff_id);
                    }
                    dataArray.push(item);
                });
                $scope.antrianPoliUmum = dataArray;

                // var datatableSettings = $('#example').DataTable();        
                // datatableSettings.ajax.reload();
            });
        }

        var firstInit = function () {
            $scope.poliType = toTitleCase(
                window.location.pathname
                .replace("/antrian-","")
                .replace("-"," ")
            );

            
            listPoli().then(function() {
                getLoketAntrianPoli();
            });
        }
        
        firstInit();

        var updateStatusToCalling = function (type, id) {
            var type = type;
            var params = {
                id: id
            }
            ServicesAdmin.updateLoketAntrianStatus(params).$promise
            .then(function (result) {
                getLoketAntrianPoli();
            });
        }

        $scope.callQueue = function (type, queue, name, id) {
            var typeVoice = "Indonesian Female";
            var type = type;
            var queue = queue;
            var name = name;
            var id = id;

            function panggilanLoket () {
                responsiveVoice.speak("Pasien " + type.toUpperCase() + " ke loket pendaftaran", typeVoice, {rate: 1});
            }
            function panggilanAntrian () {
                responsiveVoice.speak("'" + queue + "'" + name, typeVoice, {rate: 0.75, volume: 1.5, onend: panggilanLoket});
            }
            
            responsiveVoice.speak("Nomor antrian ", typeVoice, {rate: 1, onend: panggilanAntrian});

            updateStatusToCalling(type, id);
        }

        $scope.openModal = function (target, type, data) {
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            if (data) {
                $scope.dataOnModal = data;
            }

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal
            });
        }

        $scope.printArea = function (divID) {
            if (!$scope.temp.duration) {
                $scope.temp.duration = 0;
            }
            $scope.temp.endDate = moment($scope.temp.startDate).add('days', $scope.temp.duration).format('DD-MM-YYYY');
            $scope.todayDate = moment().format('DD MMMM YYYY');
            setTimeout(function(){
                var printContents = document.getElementById(divID).innerHTML;
                var popupWin = window.open('', '_blank', 'width=800, height=600');
                popupWin.document.open();
                popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + printContents + '</body></html>');
                popupWin.document.close();
            }, 500);
        } 

        $scope.editPasien = function (dataPasien) {
            
        }
    });
