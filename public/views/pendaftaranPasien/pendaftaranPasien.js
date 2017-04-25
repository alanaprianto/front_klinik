'use strict';

angular.module('adminApp')
    .controller('PendaftaranPasienCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        moment
    ) {
        $scope.today = new Date();
        $scope.temp = {};
        $scope.message = {};

        var getDataOnModalOpen = function (target) {
            switch(target) {
                case 'tambahPasienBaruModal':

                    break;
                default:
                    
            }
        }

        $scope.openModal = function (target, type, data) {
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

        var defaultDataCreatePasien = function () {
            var data = {
                age: $scope.temp.age
            }
            return data;
        }

        $scope.createNewPendaftaranPasien = function () {
            $scope.message.createLoketRegisters = {};

            var data = {
                kiosk_id: $scope.temp.kiosk_id,
                patient_id: $scope.temp.patient_id,
                number_medical_record: $scope.temp.number_medical_record,
                full_name: $scope.temp.full_name,
                place: $scope.temp.place,
                birth: moment($scope.temp.birth).format("DD/MM/YYYY"),
                gender: $scope.temp.gender,
                address: $scope.temp.address,
                religion: $scope.temp.religion,
                city: $scope.temp.city,
                district: $scope.temp.district,
                sub_district: $scope.temp.sub_district,
                rt_rw: $scope.temp.rt_rw,
                phone_number: $scope.temp.phone_number,
                last_education: $scope.temp.last_education,
                job: $scope.temp.job,
                askes_number: $scope.temp.askes_number,
                poly_id: $scope.temp.poly_id,
                doctor_id: $scope.temp.doctor_id
            }

            var defaultData = defaultDataCreatePasien();

            var param = Object.assign(data, defaultData);

            ServicesAdmin.createLoketRegisters(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.createLoketRegisters.error = result.message;
                };
                $scope.result = result;
                listPendaftaranPasien(); 
                ngDialog.closeAll();
            });
        }

        $scope.createTambahRujukan = function () {
            $scope.message.createTambahRujukan = {};

            var param = {
                register_id: $scope.dataOnModal.id,
                poly_id: $scope.temp.poly_id,
                doctor_id: $scope.temp.doctor_id
            }

            ServicesAdmin.editLoketTabahRujukan(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.createTambahRujukan.error = result.message;
                };
                $scope.result = result;
                listPendaftaranPasien(); 
                ngDialog.closeAll();
            });
        }

        $scope.seachPasien = function () {
            var data = {
                query: $scope.query
            };

            ServicesAdmin.getLoketPendaftaranPatient(data).$promise
             .then(function (result) {
                $scope.resultPasien = result.datas.polies;
            });
        }

        $scope.getAge = function () {
            $scope.temp.age = moment().diff($scope.temp.birth, 'years');
        }

        $scope.getDoctor = function () {
            $scope.listPoli.forEach(function(item) {
                if (item.id == $scope.temp.poly_id && item.doctors) {
                    $scope.listDoctor = item.doctors;
                }
            });
        }

        var listPoli = function () {
            ServicesCommon.getPolies().$promise
            .then(function (result) {
                $scope.listPoli = result.datas.polies;
            });
        }

        var listPendaftaranPasien = function () {
            ServicesAdmin.getLoketRegisters().$promise
            .then(function (result) {
                var tempData = [];
                result.datas.registers.forEach(function (item, key) {
                    if (item.patient && item.patient.birth) {
                        item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
                    }
                    if (item.status == 1) {
                        item.displayedStatus = 'open';
                    }
                    if (item.status == 2) {
                        item.displayedStatus = 'close';
                    }

                    if (item.references) {
                        item.references.forEach(function (ref, idx) {
                            if (ref.status == 1) {
                                item.references[idx].displayedStatus = 'belum diperiksa';
                            }
                            if (ref.status == 2) {
                                item.references[idx].displayedStatus = 'sedang diperiksa';
                            }
                            if (ref.status == 3) {
                                item.references[idx].displayedStatus = 'sudah diperiksa';
                            }
                        });
                    }
                    tempData.push(item);
                });
                $scope.tableListRegister = tempData;
            });
        }

        var firstInit = function () {
            listPendaftaranPasien();
            listPoli();
        }
        
        firstInit();
    });