'use strict';

angular.module('adminApp')
    .controller('ModalPendaftaranPasienCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        moment
    ) {        
        var defaultDataCreatePasien = function () {
            var data = {
                age: $scope.temp.age
            }
            return data;
        }

        $scope.createNewPendaftaranPasien = function () {
            $scope.message.createLoketRegisters = {};
    
            var data = {
                kiosk_id: $scope.kiosk_id,                
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
                ngDialog.closeAll();
            });
        }

        $scope.createOldPendaftaranPasien = function () {
            $scope.message.createLoketRegisters = {};

            var data = {
                kiosk_id: $scope.kiosk_id,
                patient_id: $scope.patient_id,            
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
                ngDialog.closeAll();
            });
        }

        $scope.searchPasien = function () {
            var params = {
                data: $scope.temp.query
            };

            ServicesAdmin.getLoketPendaftaranPatient(params).$promise
            .then(function (result) {
                $scope.temp.patients = result.datas.patient;
            });
        }

        $scope.oldPatient = function () {            
            $scope.temp.number_medical_record = $scope.temp.patient.number_medical_record;
            $scope.temp.full_name = $scope.temp.patient.full_name;
            $scope.temp.place = $scope.temp.patient.place;
            $scope.temp.birth = new Date($scope.temp.patient.birth);
            $scope.temp.age = moment().diff($scope.temp.birth, 'years');
            $scope.temp.gender = $scope.temp.patient.gender;
            $scope.temp.address = $scope.temp.patient.address;
            $scope.temp.religion = $scope.temp.patient.religion;
            $scope.temp.province = $scope.temp.patient.province;
            $scope.temp.city = $scope.temp.patient.city;
            $scope.temp.district = $scope.temp.patient.district;
            $scope.temp.sub_district = $scope.temp.patient.sub_district;
            $scope.temp.rt_rw = $scope.temp.patient.rt_rw;
            $scope.temp.phone_number = $scope.temp.patient.phone_number;
            $scope.temp.last_education = $scope.temp.patient.last_education;
            $scope.temp.job = $scope.temp.patient.job;
            $scope.temp.askes_number = $scope.temp.patient.askes_number;

            $scope.patient_id = $scope.temp.patient.id;
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

        $scope.getListPoli = function () {
            ServicesCommon.getPolies().$promise
            .then(function (result) {
                $scope.listPoli = result.datas.polies;
            });
        }

        $scope.getListProvinces = function () {
            ServicesCommon.getProvinces().$promise
            .then(function (result) {
                $scope.provinces = result.datas.provinces;
            });
        }

        $scope.getListCities = function () {
            ServicesCommon.getCities().$promise
            .then(function (result) {
                $scope.cities = result.datas.cities;
            });
        }

        $scope.getListDistricts = function () {
            ServicesCommon.getDistricts().$promise
            .then(function (result) {
                $scope.districts = result.datas.districts;
            });
        }
    });