'use strict';

angular.module('adminApp')
    .controller('PendaftaranPasienCtrl', function($scope, $http, $rootScope, ServicesLoket) {
        var getRegister = function () {
            ServicesLoket.getRegister().$promise.then(function (result) {
                $scope.tableListRegister = result.datas.resgister; 
            });
        }

        var firstInit = function () {
            getRegister();
        }
        
        firstInit();
    });
