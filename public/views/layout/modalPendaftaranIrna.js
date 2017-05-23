'use strict';

angular.module('adminApp')
    .controller('ModalPendaftaranIrnaCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog,
        ServicesAdmin,
        ServicesCommon,
        moment
    ) {  

        $scope.currHour = moment().format('h:mm:ss a');

        var defaultDataCreatePasien = function () {
            var data = {
                age: $scope.temp.age
            }
            return data;
        }

        var getPatients = function () {
            ServicesAdmin.getLoketPendaftaranPatient().$promise
            .then(function (result) {
                $scope.patients = result.datas.patient;
            });
        }        

        var getSSRl4b = function () {
            return $http.get('views/config/defaultSSRInapRl4a.json').then(function(data) {
                $scope.defaultSSRjalanRl4b = data.data;
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.genders = data.data.gender;
            });
        };

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

        $scope.oldPatient = function (patient) {
            if (patient) {
                $scope.temp.number_medical_record = patient.number_medical_record;
                $scope.temp.full_name = patient.full_name;
                $scope.temp.place = patient.place;
                $scope.temp.birth = new Date(moment(patient.birth, "DD/MM/YYYY"));
                
                var diffDuration = moment.duration(moment().diff($scope.temp.birth));
                $scope.temp.age = diffDuration.years();
                $scope.temp.month = diffDuration.months();
                $scope.temp.day = diffDuration.days();
                if (isNaN(diffDuration)) {
                    $scope.temp.age = 0;
                    $scope.temp.month = 0;
                    $scope.temp.day = 0;
                }

                $scope.temp.address = patient.address;            
                $scope.temp.rt_rw = patient.rt_rw;
                $scope.temp.phone_number = patient.phone_number;                
                $scope.temp.askes_number = patient.askes_number;
                $scope.patient_id = patient.id;

                $scope.provinces.forEach(function (val) {
                    if (val.code == patient.province) {
                        return $scope.temp.province = val;
                    }
                });
                $scope.cities.forEach(function (val) {
                    if (val.code == patient.city) {
                        return $scope.temp.city = val;
                    }
                });
                $scope.districts.forEach(function (val) {
                    if (val.code == patient.district) {
                        return $scope.temp.district = val;
                    }
                });
                $scope.getListSubDistricts().then(function () {
                    $scope.subDistricts.forEach(function (val) {
                        if (val.code == patient.sub_district) {
                            return $scope.temp.subDistrict = val;
                        }
                    });
                });                
                $scope.defaultValues.gender.forEach(function (val) {
                    if (val.value == patient.gender) {
                        return $scope.temp.gender = val;
                    }
                });
                $scope.defaultValues.listJobs.forEach(function (val) {
                    if (val.value == patient.job) {
                        return $scope.temp.job = val;
                    }
                });                
                $scope.defaultValues.religion.forEach(function (val) {
                    if (val.value == patient.religion) {
                        return $scope.temp.religion = val;                        
                    }
                });                
                $scope.defaultValues.education.forEach(function (val) {
                    if (val.value == patient.last_education) {
                        return $scope.temp.last_education = val;
                    }
                });
            }
        }

        $scope.getAge = function () {
            var diffDuration = moment.duration(moment().diff($scope.temp.birth));
            $scope.temp.age = diffDuration.years();
            $scope.temp.month = diffDuration.months();
            $scope.temp.day = diffDuration.days();
            if (isNaN(diffDuration)) {
                $scope.temp.age = 0;
                $scope.temp.month = 0;
                $scope.temp.day = 0;
            }
        }

        $scope.getRoom = function () {
            return ServicesCommon.getRoom({class_room_id:$scope.temp.class_room.id})
            .$promise.then(function (result) {
                $scope.rooms = result.datas.rooms;
                $scope.beds = {};
            });
        }

        $scope.getBed = function () {
            return ServicesCommon.getBed({room_id:$scope.temp.room.id})
            .$promise.then(function (result) {
                $scope.beds = result.datas.beds;
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
        $scope.getListSubDistricts = function () {
            if ($scope.temp && $scope.temp.district && $scope.temp.district.code) {
                var code = $scope.temp.district.code;
                return ServicesCommon.getSubDistricts({code: code}).$promise
                .then(function (result) {
                    $scope.subDistricts = result.datas.subDistricts;
                });
            }
        }

        var firstInit = function () {
            getDefaultValues();
            getSSRl4b();
            getPatients();

            $scope.getListProvinces();
            $scope.getListCities();
            $scope.getListDistricts();
        }

        firstInit();

        $scope.createNewPendaftaranPasien = function () {
            console.log('createNewPendaftaranPasien');
            $scope.message.createLoketRegisters = {};
            var data = {                
                number_medical_record: $scope.temp.number_medical_record,
                full_name: $scope.temp.full_name,
                place: $scope.temp.place,
                birth: moment($scope.temp.birth).format("DD/MM/YYYY"),
                gender: $scope.temp.gender.value,
                address: $scope.temp.address,
                religion: $scope.temp.religion.value,
                province: $scope.temp.province.code,
                city: $scope.temp.city.code,
                district: $scope.temp.district.code,
                sub_district: $scope.temp.subDistrict.code,
                rt_rw: $scope.temp.rt_rw,
                phone_number: $scope.temp.phone_number,
                last_education: $scope.temp.last_education.value,
                job: $scope.temp.job.value,
                askes_number: $scope.temp.askes_number,
                class_room_id: $scope.temp.class_room.id,
                room_id: $scope.temp.room.id,
                bed_id: $scope.temp.bed.id
            }
            
            serviceCreatePendaftaran(data);
        }

        $scope.createOldPendaftaranPasien = function () {
            console.log("createOldPendaftaranPasien");
            $scope.message.createLoketRegisters = {};
            var data = {                
                patient_id: $scope.patient_id,
                class_room_id: $scope.temp.class_room.id,
                room_id: $scope.temp.room.id,
                bed_id: $scope.temp.bed.id
            }
            
            serviceCreatePendaftaran(data);
        }

        var serviceCreatePendaftaran = function (data) {
            var rp = "-";
            var rp_state = "-";
            var cp = "-";
            if ($scope.temp.responsible_person) {
                rp = $scope.temp.responsible_person;
            }
            if ($scope.temp.responsible_person_state) {
                rp_state = $scope.temp.responsible_person_state.value;
            }
            if ($scope.temp.cause_pain) {
                cp = $scope.temp.cause_pain.no_dtd;
            }
            var registerData = {
                responsible_person: rp,
                responsible_person_state: rp_state,
                how_visit: $scope.temp.how_visit.value,
                time_attend: $scope.currHour,                
                cause_pain: cp,
                type: 1
            }

            var defaultData = defaultDataCreatePasien();

            var param = Object.assign(defaultData, data, registerData);

            ServicesAdmin.createLoketRegisters(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.createLoketRegisters.error = result.message;
                };

                $scope.result = result;                
                ngDialog.closeAll();                
            });
        }
    });