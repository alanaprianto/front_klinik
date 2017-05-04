'use strict';

angular.module('adminApp')
    .controller('DaftarPasienCtrl', function(
        $scope, 
        $http, 
        ngDialog,
        moment,
        $rootScope, 
        ServicesAdmin,
        ServicesLoket,
        ServicesPenataJasa,
        ServicesKasir,
        ServicesApotek) {
        var initTemp = function () {
            $scope.temp = {};
            $scope.temp.startDate = new Date();
        }
        var listDataPasien = function () {
            ServicesAdmin.getVisitor().$promise
            .then(function (result) {
                var tempData=[];
                result.datas.patients.forEach(function(item,key){
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
                
                $scope.tableListVisitor = tempData; 
            });
           $scope.printArea = function (divID) {
            $scope.currentDate = moment().format('DD MMMM YYYY HH:mm:ss');
            setTimeout(function(){
                var printContents = document.getElementById(divID).innerHTML;
                var popupWin = window.open('', '_blank', 'width=800, height=600');
                popupWin.document.open();
                popupWin.document.write(
                    '<html>'+
                        '<head>'+
                            '<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css" />'+
                            '<link rel="stylesheet" type="text/css" href="assets/css/angular-to-pure-css.css" />'+
                            '<link rel="stylesheet" type="text/css" href="assets/css/print-kiosk.css" />'+
                        '</head>'+
                        '<body onload="window.print()">' + printContents + 
                        '</body>'+
                    '</html>'
                );
                popupWin.document.close();
            }, 500);
        }
            $scope.openModal = function (target, type, data) {
                console.log(data);
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
        }
        // var listDataPasien = function () {
        //     ServicesLoket.getVisitor().$promise
        //     .then(function (result) {
        //         var tempData=[];
        //         result.datas.patients.forEach(function(item,key){
                     
        //              if (item.patient && item.patient.birth) {
        //                 item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
        //             }
        //             switch (item.gender) {
        //             case 1:
        //                item.gender = 'Laki-laki';
        //                 break;
        //             case 2:
        //                 item.gender = 'Perempuan';
        //                 break;
        //             }
        //             tempData.push(item);
        //         });
                
        //         $scope.tableListVisitor = tempData; 
        //     });
        //     $scope.openModal = function (target, type, data) {
        //     console.log(target);
        //     var cssModal = '';
        //     if (type) {
        //         cssModal = 'modal-' + type;
        //     }

        //     if (data) {
        //         $scope.dataOnModal = data;
        //     }

        //     ngDialog.open({
        //         template: target,
        //         scope: $scope,
        //         className: 'ngDialog-modal ' + cssModal
        //     });
        // }
        // }
        // var listDataPasien = function () {
        //     ServicesPenataJasa.getVisitor().$promise
        //     .then(function (result) {
        //         var tempData=[];
        //         result.datas.patients.forEach(function(item,key){
        //              if (item.patient && item.patient.birth) {
        //                 item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
        //             }
        //             switch (item.gender) {
        //             case 1:
        //                item.gender = 'Laki-laki';
        //                 break;
        //             case 2:
        //                 item.gender = 'Perempuan';
        //                 break;
        //             }
        //             tempData.push(item);
        //         });
                
        //         $scope.tableListVisitor = tempData; 
        //     });
        //     $scope.openModal = function (target, type, data) {
        //     console.log(target);
        //     var cssModal = '';
        //     if (type) {
        //         cssModal = 'modal-' + type;
        //     }

        //     if (data) {
        //         $scope.dataOnModal = data;
        //     }

        //     ngDialog.open({
        //         template: target,
        //         scope: $scope,
        //         className: 'ngDialog-modal ' + cssModal
        //     });
        // }
        // }
        // var listDataPasien = function () {
        //     ServicesKasir.getVisitor().$promise
        //     .then(function (result) {
        //         var tempData=[];
        //         result.datas.patients.forEach(function(item,key){
        //              if (item.patient && item.patient.birth) {
        //                 item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
        //             }
        //             switch (item.gender) {
        //             case 1:
        //                item.gender = 'Laki-laki';
        //                 break;
        //             case 2:
        //                 item.gender = 'Perempuan';
        //                 break;
        //             }
        //             tempData.push(item);
        //         });
                
        //         $scope.tableListVisitor = tempData; 
        //     });
        //     $scope.openModal = function (target, type, data) {
        //     console.log(target);
        //     var cssModal = '';
        //     if (type) {
        //         cssModal = 'modal-' + type;
        //     }

        //     if (data) {
        //         $scope.dataOnModal = data;
        //     }

        //     ngDialog.open({
        //         template: target,
        //         scope: $scope,
        //         className: 'ngDialog-modal ' + cssModal
        //     });
        // }
        // }
        //  var listDataPasien = function () {
        //     ServicesKasir.getVisitor().$promise
        //     .then(function (result) {
        //         var tempData=[];
        //         result.datas.patients.forEach(function(item,key){
        //              if (item.patient && item.patient.birth) {
        //                 item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
        //             }
        //             switch (item.gender) {
        //             case 1:
        //                item.gender = 'Laki-laki';
        //                 break;
        //             case 2:
        //                 item.gender = 'Perempuan';
        //                 break;
        //             }
        //             tempData.push(item);
        //         });
                
        //         $scope.tableListVisitor = tempData; 
        //     });
        //     $scope.openModal = function (target, type, data) {
        //     console.log(target);
        //     var cssModal = '';
        //     if (type) {
        //         cssModal = 'modal-' + type;
        //     }

        //     if (data) {
        //         $scope.dataOnModal = data;
        //     }

        //     ngDialog.open({
        //         template: target,
        //         scope: $scope,
        //         className: 'ngDialog-modal ' + cssModal
        //     });
        // }
        // }
        var firstInit = function () {
            listDataPasien();
        }

        firstInit();
    });
