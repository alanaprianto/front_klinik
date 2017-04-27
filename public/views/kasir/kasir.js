'use strict';

angular.module('adminApp')
    .controller('KasirController', function(
        $scope, 
        $http, 
        ngDialog,
        moment,
        $rootScope, 
        ServicesAdmin
    ) {
        var listDataPasien = function () {
            ServicesAdmin.getKasirPayments().$promise
            .then(function (result) {
                var tempData = [];
                result.datas.registers.forEach(function(item,key){
                     if (item.patient && item.patient.birth) {
                        item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
                    }
                    switch (item.gender) {
                    case 1:
                       item.gender = 'Laki-laki';
                        break;
                    case 2:
                        item.gender = 'Perempuan';
                        break;
                    }
                    tempData.push(item);
                });
                
                $scope.tableListPayment = tempData; 
            });
        }

        $scope.openModal = function (target, type, data) {
            console.log(target);
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
        
        var firstInit = function () {
            listDataPasien();
        }

        firstInit();
    });
