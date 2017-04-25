'use strict';

angular.module('adminApp')
    .controller('KunjunganCtrl', function($scope, $http, $rootScope, ServicesLoket) {
        var getLoketKunjunganList = function () {
            ServicesLoket.getLoketKunjungan().$promise.then(function (result) {
                $scope.tableListLoketKunjungan = result.datas.Kunjungan; 
            });
        }

        var firstInit = function () {
            getLoketKunjunganList();
        }
        
        firstInit();
    });
