'use strict';

angular.module('adminApp')
    .controller('StaffCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        $controller,
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        SweetAlert,
        moment
    ) {
    
    $scope.temp = {};

    var getDataOnModalOpen = function (data) {
        return ServicesCommon.getStaff({id: data.id}).$promise
        .then(function (result) {
            console.log(result);
        });
    }

    $scope.openModal = function (target, type, data) {
        var cssModal = '';
        if (type) {
            cssModal = 'modal-' + type;
        }

        if (data) {
            $scope.dataOnModal = data;
        }

        if (type == "tambah") {
            $scope.titlecredStaffModal = "Tambah Staff ";
        } else {
            $scope.temp.id = data.id;
            $scope.temp.nik = data.nik;
            $scope.temp.full_name = data.full_name;
            $scope.temp.place = data.place;
            $scope.temp.birth = data.birth;
            $scope.temp.age = data.age;
            $scope.temp.gender = data.gender;
            $scope.temp.address = data.address;
            $scope.temp.religion = data.religion;
            $scope.temp.province = data.province;
            $scope.temp.city = data.city;
            $scope.temp.district = data.district;
            $scope.temp.sub_district = data.sub_district;
            $scope.temp.rt_rw = data.rt_rw;
            $scope.temp.phone_number = data.phone_number;
            $scope.temp.last_education = data.last_education;
            $scope.temp.staff_job = data.staff_job;
            $scope.temp.staff_position = data.staff_position;
            $scope.temp.image_profile = data.image_profile;
            $scope.temp.user_id = data.user_id;
            $scope.temp.staff_id = data.staff_id;
            $scope.titlecredStaffModal = "Edit Staff ";
        }
        $scope.typecredStaffJob = type;

        ngDialog.open({
        template: target,
        scope: $scope,
        className: 'ngDialog-modal ' + cssModal});
    }

    var genderToString = function (val) {
        if (val !== null && val !== undefined) {
            var result = "";
            $scope.defaultValues.gender.forEach(function (item) {
                if (val == item.value) {
                    result = item.key;
                }
            });
            return result;
        }
    }

    var listStaffPosition = function () {
        return ServicesCommon.getStaffPositions({used: true}).$promise
        .then(function (result) {
            $scope.listStaffPosition = result.datas.staffpositions;
        });
    }

    var listStaffJob = function () {
        return ServicesCommon.getStaffJobs().$promise
        .then(function (result) {
            $scope.listStaffJob = result.datas.staffjobs;
        });
    }

    var listStaff = function () {
        return ServicesCommon.getStaff().$promise
        .then(function (result) {
            console.log(result);
            var tempData = [];
            result.datas.staff.forEach(function (item, key) {
                item.displayedGender = genderToString(item.gender);
                tempData.push(item);
            });
            $scope.tableListStaff = tempData;
        });
    }

    var getDefaultValues = function() {
        return $http.get('views/config/defaultValues.json').then(function(data) {
            $scope.defaultValues = data.data;
        });
    }

    function webWorker () {
        listStaff()
        .then(function () {
            setTimeout(webWorker, 5000);
        })
    }

    $scope.createnewStaff = function () {            
        $scope.message = {};
        var param = {
            nik       : $scope.temp.nik,
            full_name : $scope.temp.full_name,
            place     : $scope.temp.place,
            birth     : $scope.temp.birth,
            age       : $scope.temp.age,
            gender    : $scope.temp.gender.value,
            address   : $scope.temp.address,
            religion  : $scope.temp.religion.value,
            province  : $scope.temp.province.code,
            city      : $scope.temp.city.code,
            district  : $scope.temp.district.code,
            sub_district  : $scope.temp.subDistrict.code,
            rt_rw     : $scope.temp.rt_rw,
            phone_number : $scope.temp.phone_number,
            last_education : $scope.temp.last_education.value,
            staff_job_id : $scope.temp.staff_job.id,
            staff_position_id: $scope.temp.staff_position.id,
            image_profile: $scope.temp.image_profiledist,
            user_id   : $scope.temp.user_iddist,
            staff_id  : $scope.temp.staff_iddist
        }

        ServicesCommon.createStaffJob(param).$promise
        .then(function (result) {
            if (!result.isSuccess) {
                return $scope.message.error = result.message;
            };
            
            ngDialog.closeAll();
            listStaff();
        });
    }

    $scope.deleteStaff = function (id) {
        SweetAlert.swal({
           title: "Konfirmasi?",
           text: "Anda yakin akan delete Data ini?",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Ya",
           cancelButtonText: "Tidak",
           closeOnConfirm: true
       }, function(isConfirm){ 
            if (isConfirm) {
                $scope.message = {};

                ServicesCommon.deleteStaffJob({id: id}).$promise
                .then(function (result) {
                    if (!result.isSuccess) {
                        return $scope.message.error = result.message;
                    };

                    ngDialog.closeAll();
                    listStaff();
                });
            }
        });            
    }

    $scope.getAge = function () {
        $scope.temp.age = moment().diff($scope.temp.birth, 'years');
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

    var getDefaultValues = function() {
        return $http.get('views/config/defaultValues.json').then(function(data) {
            $scope.defaultValues = data.data;
        });            
    };

    $scope.updateStaff = function () {
        SweetAlert.swal({
           title: "Konfirmasi?",
           text: "Anda yakin akan update Data ini?",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Ya",
           cancelButtonText: "Tidak",
           closeOnConfirm: true
       }, function(isConfirm){ 
            if (isConfirm) {
                console.log($scope.temp);
                $scope.message = {};
                var param = {
                    id: $scope.temp.id,
                    nik       : $scope.temp.nik,
                    full_name : $scope.temp.full_name,
                    place     : $scope.temp.place,
                    birth     : $scope.temp.birth,
                    age       : $scope.temp.age,
                    gender    : $scope.temp.gender.value,
                    address   : $scope.temp.address,
                    religion  : $scope.temp.religion.value,
                    province  : $scope.temp.province.code,
                    city      : $scope.temp.city.code,
                    district  : $scope.temp.district.code,
                    sub_district  : $scope.temp.subDistrict.code,
                    rt_rw     : $scope.temp.rt_rw,
                    phone_number : $scope.temp.phone_number,
                    last_education : $scope.temp.last_education.value,
                    staff_job_id : $scope.temp.staff_job.id,
                    staff_position_id: $scope.temp.staff_position_iddist,
                    image_profile: $scope.temp.image_profiledist,
                    user_id   : $scope.temp.user_iddist,
                    staff_id  : $scope.temp.staff_iddist,
                }

                ServicesCommon.updateStaff(param).$promise
                .then(function (result) {
                    if (!result.isSuccess) {
                        return $scope.message.error = result.message;
                    };

                    ngDialog.closeAll();
                    listStaff();
                });
            }
        }); 
    }

    var firstInit = function () {
        getDefaultValues()
        .then(webWorker);
        listStaffJob();
        listStaffPosition();
        $scope.getListProvinces();
        $scope.getListCities();
        $scope.getListDistricts();
    }

    firstInit();
});