'use strict';

angular.module('adminApp')
    .controller('DaftarPasienCtrl', function(
        $scope, 
        $http, 
        ngDialog,
        moment,
        $rootScope, 
        ServicesAdmin,
        ServicesLoket,
        ServicesPenataJasa,
        ServicesKasir,
        ServicesApotek
    ) {
        var initTemp = function () {
            $scope.temp = {};
            $scope.temp.startDate = new Date();
        }

        $scope.formatDate = function(date){
            var dateOut = new Date(date);
            return dateOut;
        };

        var jobToString = function (val) {
            if (val !== null && val !== undefined) {
                var result = "";
                $scope.job.forEach(function (item) {
                    if (val == item.value) {
                        result = item.key;
                    }
                });
                return result;
            }
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.gender = data.data.gender;
                $scope.job = data.data.listJobs;
            });
        };

        var listDataPasien = function () {
            ServicesAdmin.getVisitor().$promise
            .then(function (result) {
                var tempData=[];
                result.datas.patients.forEach(function(item,key){
                     if (item) {
                        item.age = moment().diff(moment(item.birth, "DD/MM/YYYY", true), 'years');

                        var diffDuration = moment.duration(moment().diff(item.birth));
                        item.displayedAge = diffDuration.years();
                        item.displayedMonth = diffDuration.months();
                        item.displayedDay = diffDuration.days();
                        if (isNaN(diffDuration)) {
                            item.displayedAge = 0;
                            item.displayedMonth = 0;
                            item.displayedDay = 0;
                        }

                        item.displayedJob = jobToString(item.job);
                    }
                    switch (item.gender) {
                    case 1:
                        item.displayedGender = 'Laki-laki';
                        break;
                    case 2:
                        item.displayedGender = 'Perempuan';
                        break;
                    }
                    tempData.push(item);
                });
                
                $scope.tableListVisitor = tempData; 
            });
        }
        
        var firstInit = function () {
            getDefaultValues()
            .then(listDataPasien);
        }

        firstInit();

        $scope.printArea = function (divID) {
            $scope.currentDate = moment().format('DD MMMM YYYY HH:mm:ss');
            $scope.temp.displayedJob = jobToString($scope.dataOnModal.patient.job);
            setTimeout(function(){
                var printContents = document.getElementById(divID).innerHTML;
                var popupWin = window.open('', '_blank', 'width=800, height=600');
                popupWin.document.open();
                popupWin.document.write(
                    '<html>'+
                        '<head>'+
                            '<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css" />'+
                            '<link rel="stylesheet" type="text/css" href="assets/css/angular-to-pure-css.css" />'+
                            '<link rel="stylesheet" type="text/css" href="assets/css/print-kiosk.css" />'+
                        '</head>'+
                        '<body onload="window.print()">' + printContents + 
                        '</body>'+
                    '</html>'
                );
                popupWin.document.close();
            }, 500);
        }

        $scope.openModal = function (target, type, data) {
            console.log(data);
            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            if (data) {
                $scope.dataOnModal = data;
            }
            
            $scope.dataOnModal.displayedJob = jobToString(data.job);
            ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }
    });
