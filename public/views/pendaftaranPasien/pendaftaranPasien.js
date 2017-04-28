'use strict';

angular.module('adminApp')
    .controller('PendaftaranPasienCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        $controller,
        ngDialog, 
        ServicesAdmin,
        ServicesCommon,
        moment
    ) {
        $scope.today = new Date();
        $scope.temp = {};
        $scope.message = {};

        angular.extend(this, $controller('ModalPendaftaranPasienCtrl', {$scope: $scope}));

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
                        item.displayedStatus = 'closed';
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

            // from extended ModalPendaftaranPasienCtrl
            $scope.getListPoli();
            $scope.getListProvinces();
        }
        
        firstInit();
    });