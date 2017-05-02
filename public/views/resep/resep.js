'use strict';

angular.module('adminApp')
    .controller('ResepCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog,
        ServicesApotek) {
        var getApotekRecipes = function () {
            ServicesApotek.getApotekRecipes().$promise.then(function (result) {
                $scope.tableListRecipes = result.datas.recipes; 
            });
        }

        var firstInit = function () {
            getApotekRecipes();
        }
        
        firstInit();

        var getApotekRecipesCreate= function () {
            ServicesAdmin.getApotekRecipesCreate().$promise.then(function (result) {
                $scope.listObat = result.datas.recipes;
            });
        }

        var createEditInit = function () {
            getApotekRecipesCreate();
        }
        
        createEditInit();

        $scope.openModal = function (target, type, data) {
            console.log(target);
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
                className: 'ngDialog-modal ' + cssModal
            });
        }
    });
