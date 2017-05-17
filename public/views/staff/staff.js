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

            if (type=="tambah") {
                $scope.titlecredStaffModal = "Tambah Staff ";
            } else {
                $scope.temp.id = data.id;
                $scope.temp.nikdist = data.nik;
                $scope.temp.full_namedist = data.full_name;
                $scope.temp.placedist = data.place;
                $scope.temp.birthdist = data.birth;
                $scope.temp.agedist = data.age;
                $scope.temp.genderdist = data.gender;
                $scope.temp.addressdist = data.address;
                $scope.temp.religiondist = data.religion;
                $scope.temp.provincedist = data.province;
                $scope.temp.citydist = data.city;
                $scope.temp.districtdist = data.district;
                $scope.temp.sub_districtdist = data.sub_district;
                $scope.temp.rt_rwdist = data.rt_rw;
                $scope.temp.phone_numberdist = data.phone_number;
                $scope.temp.last_educationdist = data.last_education;
                $scope.temp.staff_job_iddist = data.staff_job_id;
                $scope.temp.staff_position_iddist = data.staff_position_id;
                $scope.temp.image_profiledist = data.image_profile;
                $scope.temp.user_iddist = data.user_id;
                $scope.temp.staff_iddist = data.staff_id;
                $scope.titlecredStaffModal = "Edit Staff ";
            }
            $scope.typecredStaffJob = type;

            ngDialog.open({
            template: target,
            scope: $scope,
            className: 'ngDialog-modal ' + cssModal});
            // if (target=="createDistributorModal") {
            //     ngDialog.open({
            //     template: target,
            //     scope: $scope,
            //     className: 'ngDialog-modal ' + cssModal});
            // } else {
            //     getDataOnModalOpen(data)
            //     .then(
            //         ngDialog.open({
            //         template: target,
            //         scope: $scope,
            //         className: 'ngDialog-modal ' + cssModal
            //     }));
            // }            
        }

        var listStaffJob = function () {
            return ServicesCommon.getStaff().$promise
            .then(function (result) {
                console.log(result);
                var tempData = [];
                result.datas.staff.forEach(function (item, key) {
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
            listStaffJob()
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            getDefaultValues()
            .then(webWorker);
        }

        firstInit();

        $scope.createnewStaff = function () {            
            $scope.message = {};
            var param = {
                nik       : $scope.temp.nikdist,
                full_name : $scope.temp.full_namedist,
                place     : $scope.temp.placedist,
                birth     : $scope.temp.birthdist,
                age       : $scope.temp.agedist,
                gender    : $scope.temp.genderdist,
                address   : $scope.temp.addressdist,
                religion  : $scope.temp.religiondist,
                province  : $scope.temp.provincedist,
                city      : $scope.temp.citydist,
                district  : $scope.temp.districtdist,
                rt_rw     : $scope.temp.rt_rwdist,
                phone_number : $scope.temp.phone_numberdist,
                last_education : $scope.temp.last_educationdist,
                staff_job_id : $scope.temp.staff_job_iddist,
                staff_position_id: $scope.temp.staff_position_iddist,
                image_profile: $scope.temp.image_profiledist,
                user_id   : $scope.temp.user_iddist,
                staff_id  : $scope.temp.staff_iddist,
               
            }

            ServicesCommon.createStaffJob(param).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.message.error = result.message;
                };
                
                ngDialog.closeAll();
                listStaffJob();
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
                        listStaffJob();
                    });
                }
            });            
        }

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
                        nik       : $scope.temp.nikdist,
                        full_name : $scope.temp.full_namedist,
                        place     : $scope.temp.placedist,
                        birth     : $scope.temp.birthdist,
                        age       : $scope.temp.agedist,
                        gender    : $scope.temp.genderdist,
                        address   : $scope.temp.addressdist,
                        religion  : $scope.temp.religiondist,
                        province  : $scope.temp.provincedist,
                        city      : $scope.temp.citydist,
                        district  : $scope.temp.districtdist,
                        rt_rw     : $scope.temp.rt_rwdist,
                        phone_number : $scope.temp.phone_numberdist,
                        last_education : $scope.temp.last_educationdist,
                        staff_job_id : $scope.temp.staff_job_iddist,
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
                        listStaffJob();
                    });
                }
            }); 
        }
    });

