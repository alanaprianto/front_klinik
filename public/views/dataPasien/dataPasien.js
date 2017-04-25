'use strict';

angular.module('adminApp')
    .controller('DaftarPasienCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ServicesAdmin) {
        var listDataPasien = function () {
            ServicesAdmin.getVisitor().$promise
            .then(function (result) {
                var tempData=[];
                references.datas.visitor.forEach(function(item,key){
                     if (item.patient && item.patient.birth) {
                        item.patient.age = moment().diff(moment(item.patient.birth, "DD/MM/YYYY", true), 'years');
                    }
                    tempData.push(item);
                });

                $scope.tableListVisitor = result.datas.visitor; 
            });
        }
        var firstInit = function () {
            listDataPasien();
        }

        firstInit();
    });
