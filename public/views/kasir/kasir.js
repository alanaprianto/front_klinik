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
        $scope.temp = {};
        $scope.temp.totalPayments = 0;
        $scope.message = '';

        var genderToString = function (val) {
            if (val !== null && val !== undefined) {
                var result = "";
                $scope.gender.forEach(function (item) {
                    if (val == item.value) {
                        result = item.key;
                    }
                });
                return result;
            }
        }

        var statusOnPayments = function (val) {
            if (val && val.status) {
                var result = '';
                $scope.statusPayments.forEach(function (item) {
                    if (val.status == item.value) {
                        result = item.key;
                    }
                });         
                return result;  
            }
        }

        var listDataPasien = function () {
            ServicesAdmin.getKasirPayments().$promise
            .then(function (result) {
                var tempData = [];
                result.datas.registers.forEach(function(item, key){
                    item.displayedStatus = statusOnPayments(item);
                    item.displayedCreatedAt = moment(item.created_at).format('DD MMM YYYY, HH:mm');

                    if (item.patient) {
                        if (item.patient.birth) {
                            item.displayedAge = moment().diff(moment(item.patient.birth, "DD/MM/YYYY"), 'years');
                        }
                        if (item.patient.gender) {
                            item.displayedGender = genderToString(item.patient.gender);
                        }
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
        
        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.statusPayments = data.data.statusPayments;
                $scope.gender = data.data.gender;
            });
        };

        var firstInit = function () {
            getDefaultValues().then(function () {
                listDataPasien();
            });
        }

        firstInit();

        $scope.createKasirPayments = function () {
            if (!$scope.temp.payment) {
                console.log('no payment amount inserted')
                return;
            }

            var params = {
                register_id: $scope.dataOnModal.id,
                payment: $scope.temp.payment
            };

            ServicesAdmin.createKasirPayments(params).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    $scope.message = result.message;
                    return;
                }

                ngDialog.closeAll();
                listDataPasien();
            })
        }
    });
