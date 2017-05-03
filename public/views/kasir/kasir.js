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
            if (val && val.payment_status) {
                var result = '';
                $scope.statusPayments.forEach(function (item) {
                    if (val.payment_status == item.value) {
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

                    if (item.references) {
                        var totalPayments = 0;

                        item.references.forEach(function (val) {
                            totalPayments += val.reference_total_payment;
                        });
                        item.totalPayments = totalPayments;
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
                popupWin.document.write(
                    '<html>'+
                        '<head>'+
                            '<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css" />'+
                            '<link rel="stylesheet" type="text/css" href="assets/css/angular-to-pure-css.css" />'+
                            '<link rel="stylesheet" type="text/css" href="assets/css/print-kasir.css" />'+
                        '</head>'+
                        '<body onload="window.print()">' + printContents + 
                        '</body>'+
                    '</html>'
                );
                popupWin.document.close();
            }, 500);
        }

        $scope.countPayments = function () {        
            $scope.temp.diff = $scope.temp.payment - $scope.dataOnModal.totalPayments;
            // if ($scope.temp.diff.indexOf('-')=0) {
            //     console.log('contains -');
            // } else { 
            //     console.log('not contains -');
            // }
        }

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
