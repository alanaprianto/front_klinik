'use strict';

angular.module('adminApp')
    .controller('InventoriCtrl', function($scope, $http, $rootScope, ServicesCommon) {
        var getStaff = function () {
            ServicesCommon.getInventories().$promise.then(function (result) {
                $scope.tableListInventori = result.datas.inventories;
                console.log(result)
            });
        }

        var firstInit = function () {
            getStaff();
        }
        
        firstInit();
    });
