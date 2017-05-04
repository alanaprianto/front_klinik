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
                                'If the problem still persists, please contact tech support (admin@teknolands.com).' +
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
    })

    .run(function ($rootScope, $cookies, config, $window, $http) {
        var getAdminMenu = function (roleName) {
            return config.menus.find(function (item) {
                if (item[roleName]){
                    return item[roleName];
                }
            });
        }

        var getListMenu = function (roleName) {
            $http.get('views/config/menu.json').then(function(res) {
                var menus = [];
                if (!res.data) {
                    return;
                }
                res.data.menu.forEach(function (item, key) {
                    if (item.active && getAdminMenu(roleName)[roleName].indexOf(key) !== -1) {
                        menus.push(item);
                    }
                });
                $rootScope.listMenu = menus;
            });
        }

        var isLoggedIn = function () {
            var token = $cookies.get('access_token');
            if (!token) {
                $window.location.href = '/login';
                return;
            }

            $http({
                method: "get",
                url: config.url + "api/common/user-info",
                headers: {
                   'Authorization': 'Bearer ' + token
                }
            }).then(function (response) {
                if (response.data && response.data.datas) {
                    $rootScope.dataUser = response.data.datas.user;
                    getListMenu(response.data.datas.user.roles[0].name);
                }
                return;
            }, function (response) {
                $window.location.href = '/login';
            });
        };

        if (window.location.href.indexOf("login") === -1) {
            isLoggedIn();
        }
    });