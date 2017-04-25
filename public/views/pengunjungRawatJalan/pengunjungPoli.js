'use strict';

angular.module('adminApp')
    .controller('PoliCtrl', function($scope, $http, $rootScope, ServicesAdmin) {
        var getStaff = function () {
            ServicesAdmin.getStaff().$promise.then(function (result) {
                $scope.tableListPoli = result.datas.staff; 
            });
        }

        var firstInit = function () {
            getStaff();
        }
        
        firstInit();
    });
