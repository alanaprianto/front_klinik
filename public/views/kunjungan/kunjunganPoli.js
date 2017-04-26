'use strict';

angular.module('adminApp')
    .controller('KunjunganCtrl', function(
            $scope, 
            $http, 
            $rootScope, 
            ServicesAdmin
        ) {
        var getLoketKunjunganList = function () {
            ServicesAdmin.getVisitor().$promise.then(function (result) {
                $scope.tableListKunjungan = result.datas.Visitor; 
            });
        }

        var firstInit = function () {
            getVisitor();
        }
        
        firstInit();
    });
