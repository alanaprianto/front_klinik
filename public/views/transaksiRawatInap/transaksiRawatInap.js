'use strict';

angular.module('adminApp')
    .controller('TransaksiRawatInapCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        $controller,
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        moment,
        SweetAlert
    ) {
        var initTemp = function () {
            $scope.today = new Date();
            $scope.temp = {};
            $scope.message = {};
        }

        var listTransaksiRawatInap = function () {
            return ServicesAdmin.getVisitor({reg_type:1}).$promise
            .then(function (result) {
                var tempData=[];
                result.datas.patients.forEach(function(item,key){
                    tempData.push(item);
                    switch (item.gender) {
                    case 1:
                        item.displayedGender = 'Laki-laki';
                        break;
                    case 2:
                        item.displayedGender = 'Perempuan';
                        break;
                    }

                });
                result.datas.beds;
                result.datas.room;
                result.datas.class_rooms;

                $scope.tablelistTransaksiRawatInap = tempData; 
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

        var getRoom = function () {
            return ServicesCommon.getRoom().$promise.then(function (result) {
                $scope.room = result.datas.room;
            });
        }
         var getBed = function () {
            return ServicesCommon.getBed().$promise.then(function (result) {
                $scope.bed = result.datas.beds;
            });
        }

        $scope.getICD = function () {
            if (!$scope.temp.medrec.icd10) {
                $scope.temp.medrec.icd10 = [];
            }

            var params = {
                data: $scope.temp.medrec.query,
                limit: 20
            };

            return ServicesAdmin.getICD(params).$promise
            .then(function(data) {
                $scope.icd10 = data.datas.icd10s.data;

                hideICDSelected();
            });
        }

        var hideICDSelected = function () {
            angular.forEach($scope.icd10, function (val) {
                $scope.temp.medrec.icd10.forEach(function (v) {
                    if (v.code === val.code) {
                        val.selected = true;
                    }
                });
            });
        }

        $scope.addService = function () {
            var countService = $scope.temp.listServices.length;
            if (!$scope.services[countService]) {
                return;
            }

            var initAmount = 1;
            var initCost = $scope.services[countService].cost;
            var initID = $scope.services[countService].id;

            var addService = {
                cost: initCost,
                service_id: initID,
                service_amount: initAmount,
                service_total: initAmount * initCost
            };

            $scope.temp.listServices.push(addService);
        }
        
        $scope.setService = function (idx) {
            var result = {};
            $scope.services.forEach(function (item) {
                if (item.id == $scope.temp.listServices[idx].service_id) {
                    return result = item;
                };
            });

            $scope.temp.listServices[idx].cost = result.cost;
            $scope.temp.listServices[idx].service_total = result.cost * $scope.temp.listServices[idx].service_amount;
        }

        $scope.setTotal = function (idx) {
            $scope.temp.listServices[idx].service_total = $scope.temp.listServices[idx].service_amount * $scope.temp.listServices[idx].cost;
        }

        $scope.removePharmacy = function (idx) {
            $scope.temp.listPharmacy.splice(idx, 1);
        }

        $scope.addPharmacy = function () {
            var countService = $scope.temp.listPharmacy.length;
            if (!$scope.services[countService]) {
                return;
            }

            var initAmount = 1;
            var initCost = $scope.services[countService].cost;
            var initID = $scope.services[countService].id;

            var addService = {
                cost: initCost,
                service_id: initID,
                service_amount: initAmount,
                service_total: initAmount * initCost
            };

            $scope.temp.listPharmacy.push(addService);
        }
        
        $scope.setPharmacy = function (idx) {
            var result = {};
            $scope.services.forEach(function (item) {
                if (item.id == $scope.temp.listPharmacy[idx].service_id) {
                    return result = item;
                };
            });

            $scope.temp.listPharmacy[idx].cost = result.cost;
            $scope.temp.listPharmacy[idx].service_total = result.cost * $scope.temp.listPharmacy[idx].service_amount;
        }

        $scope.setTotalPharmacy = function (idx) {
            $scope.temp.listPharmacy[idx].service_total = $scope.temp.listPharmacy[idx].service_amount * $scope.temp.listPharmacy[idx].cost;
        }

        $scope.createMedicalRecord = function () {    
            $scope.createMedicalRecorderror = '';
            var idx = $scope.dataOnModal.idx;
            var icd = [];
            $scope.temp.medrec.icd10.forEach(function (val) {
                icd.push(val.code);
            });

            var data = {
                reference_id: $scope.dataOnModal.reference_id,
                anamnesa: $scope.temp.medrec.anamnesa,
                diagnosis: $scope.temp.medrec.diagnosis,
                explain: $scope.temp.medrec.explain,
                therapy: $scope.temp.medrec.therapy,
                notes: $scope.temp.medrec.notes,
                icd10: icd
            }

            ServicesAdmin.postMedicalRecord(data).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.createMedicalRecorderror = result.message;
                };

                getLoketAntrianPoli()
                .then(function () {
                    $scope.temp.medrec = {};
                    $scope.dataOnModal = $scope.antrianPoliUmum[idx];
                });
            });
        }
        
        $scope.removeICDItem = function (index) {
            $scope.temp.medrec.icd10.splice(index, 1);
        }

        $scope.getICDItem = function (item) {
            $scope.temp.medrec.icd10.push(item);

            hideICDSelected();
        }

        function webWorker () {
            listTransaksiRawatInap()
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

            initTemp();
            if (data) {
                $scope.dataOnModal = data;
                
            }

            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        } 

        $scope.openDipulangkan = function (id) {
            SweetAlert.swal({
               title: "Konfirmasi?",
               text: "Apakah Pasien Yakin di pulangkan?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               closeOnConfirm: true
           }, function(isConfirm){ 
                if (isConfirm) {
                    // pulangkan pasien
                }
            });
        }

        $scope.openRujukLab = function (id) {
            SweetAlert.swal({
               title: "Konfirmasi?",
               text: "Apakah Pasien Yakin di Rujuk ke Laboratorium?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               closeOnConfirm: true
           }, function(isConfirm){ 
                if (isConfirm) {
                    // Rujuk ke Laboratorium
                }
            });
        }

        $scope.openRujukRad = function (id) {
            SweetAlert.swal({
               title: "Konfirmasi?",
               text: "Apakah Pasien Yakin di Rujuk ke Radiologi?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               closeOnConfirm: true
           }, function(isConfirm){ 
                if (isConfirm) {
                    // Rujuk ke Radiologi
                }
            });
        }

        $scope.openRujukOpr = function (id) {
            SweetAlert.swal({
               title: "Konfirmasi?",
               text: "Apakah Pasien Yakin di Rujuk ke Operasi?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               closeOnConfirm: true
           }, function(isConfirm){ 
                if (isConfirm) {
                    // Rujuk ke Operasi
                }
            });
        }
    });