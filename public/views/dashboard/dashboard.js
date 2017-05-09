'use strict';

angular.module('adminApp')
    .controller('DashboardCtrl', function($scope, $http, $rootScope,ngDialog) {
         $scope.openModal = function (target, type, data) {       
            initTemp();
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
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }
    });
