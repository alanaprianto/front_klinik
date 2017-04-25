var app = angular.module('adminApp');

    app.controller('LogoutCtrl', function($scope, $http, $cookies, $window) {
        var doLogout = function() {
            $cookies.remove('access_token');
            $window.location.href = '/login';
        };
        
        doLogout();
    });