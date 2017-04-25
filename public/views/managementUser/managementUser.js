'use strict';

angular.module('adminApp')
    .controller('ManagementUserCtrl', function($scope, $http, $rootScope, ServicesAdmin) {
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
