'use strict';

angular.module('adminApp')
    .controller('AntrianCtrl', function($scope, $http, $rootScope, ServicesLoket) {
        var getLoketAntrianList = function () {
            ServicesLoket.getLoketAntrian().$promise.then(function (result) {
                $scope.tableListLoketAntrian = result.datas.antrian; 
            });
        }

        var firstInit = function () {
            getLoketAntrianList();
        }
        
        firstInit();
    });
