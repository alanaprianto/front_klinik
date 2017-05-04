'use strict';

angular.module('adminApp')
    .controller('KioskCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog,
        moment,
        ServicesAdmin
    ) {
        var idModal = 'modalResponse';
        $scope.temp = {};

        $scope.postKioskCreate = function (type) {
            var params = {type: type};

            ServicesAdmin.postKioskCreate(params).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    alert('Error, Please contact Tech Support');
                    return;
                }
                $scope.result = result.datas.kiosk;

                ngDialog.open({
                    template: idModal,
                    scope: $scope,
                    className: 'ngDialog-modal',
                    closeByDocument: false
                });

                $scope.printArea('printArea');
            });
        }

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
    });
