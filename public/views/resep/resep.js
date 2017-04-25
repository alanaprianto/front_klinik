'use strict';

angular.module('adminApp')
    .controller('ResepCtrl', function($scope, $http, $rootScope, ServicesAdmin) {
        var getApotekRecipes = function () {
            ServicesAdmin.getApotekRecipes().$promise.then(function (result) {
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
    });
