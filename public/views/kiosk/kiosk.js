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
                    template: 'modalResponse',
                    scope: $scope,
                    className: 'ngDialog-modal'
                });
            });
        }
    });
