 $("#btn-modal").click(function() {
     $('.basic.modal')
         .modal('setting', 'closable', false)
         .modal('show')
 });

angular.module('adminApp')
    .controller('LoginCtrl', function($scope, $http, $cookies, $window, config) {
        $scope.username = "";
        $scope.password = "";
        $scope.message = "";
        $scope.isLogin = false;

        var successFunction = function (res) {
            $cookies.put('access_token', res.access_token);
            $window.location.href = '/dashboard';
        }

        $scope.doLogin = function() {
            var data = {
                grant_type: "password",
                client_id: 2,
                client_secret: 'bGcMQqggydXmYRAOa6E04PZx5NE73WylDjQvHrvL',
                username: $scope.username,
                password: $scope.password
            };

            $http({
                method: "post",
                url: config.url + "/oauth/token",
                data: data
            }).then(function (response) {
                $scope.message = "Login Success";
                $scope.isLogin = true;
                successFunction(response.data);
            }, function (response) {
                $scope.message = "Something went wrong";
                $scope.isLogin = true;
            });
        };

        var isLoggedIn = function () {
            var token = $cookies.get(' ');
            if (!token) {
                return;
            }

            $http({
                method: "get",
                url: config.url + "/api/common/user-info",
                headers: {
                   'Authorization': 'Bearer ' + token
                }
            }).then(function (response) {
                $window.location.href = '/dashboard';
            }, function (response) {
                return;
            });
        }

        isLoggedIn();
    });