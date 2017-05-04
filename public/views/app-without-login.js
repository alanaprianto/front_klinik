'use strict';

angular.module('adminApp', [
    'ngCookies',
    'ngResource',
    'oitozero.ngSweetAlert',
    'ngDialog',
    'config',
    'angularMoment',
])
    .config(['$httpProvider', function ($httpProvider) {
        $httpProvider.interceptors.push('errorInterceptor');
    }])

    .config(['$interpolateProvider', 
        function($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        }
    ])

    .factory('errorInterceptor', function ($q, $cookies, $location, $window, SweetAlert) {
        return {
            // Add authorization token to headers
            request: function (config) {
                config.headers = config.headers || {};
                if ($cookies.get('access_token')) {
                    config.headers.Authorization = 'Bearer ' + $cookies.get('access_token');
                }
                return config;
            },

            responseError: function(response) {
                if(response.status === 403) {
                    // Intercept 403s and redirect you to login
                    $window.location.href = '/login';
                    // remove any stale tokens
                    $cookies.remove('access_token');
                    return $q.reject(response);
                } else if(response.status <= 0) {
                    // Intercept connection error
                    SweetAlert.swal({
                        title: 'Error',
                        text :'No connection to the API, please check your internet connection.' + 
                                'If the problem still persists, please contact tech support (admin@teknoland.com).' +
                            '\n' + '\n' + 'Click OK to reload this page.'
                    }, function () {
                        $window.location.reload();
                        return $q.reject(response);
                    });
                } else {
                    return $q.reject(response);
                }
            }
        };
    });