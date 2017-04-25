'use strict';

angular.module('adminApp')
    .controller('StaffCtrl', function($scope, $http, $rootScope, ServicesAdmin) {
        var getStaff = function () {
            ServicesAdmin.getStaff().$promise.then(function (result) {
                $scope.tableListStaff = result.datas.staff; 
            });
        }

        var firstInit = function () {
            getStaff();
        }
        
        firstInit();
    });
