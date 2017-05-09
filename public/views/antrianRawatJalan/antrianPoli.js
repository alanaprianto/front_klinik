'use strict';

angular.module('adminApp')
    .controller('AntrianCtrl', function(
        $scope, 
        $http, 
        $rootScope, 
        ngDialog,
        moment,
        ServicesAdmin,
        ServicesCommon
    ) {
        var initTemp = function () {
            $scope.message = '';
            $scope.temp = {};
            $scope.temp.startDate = new Date();
            $scope.temp.listServices = [];
        }


        $scope.formatDate = function(date){
            var dateOut = new Date(date);
            return dateOut;
        }

        var toTitleCase = function (str) {
            return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        }

        var genderToString = function (val) {
            if (val !== null && val !== undefined) {
                var result = "";
                $scope.gender.forEach(function (item) {
                    if (val == item.value) {
                        result = item.key;
                    }
                });
                return result;
            }
        }

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

        var tripleDigit = function(number) {
            if (number !== null && number !== undefined) {
                var str = "" + number;
                while (str.toString().length < 3) str = "0" + str;
                return str;
            }
        }

        var statusOnQueue = function (val) {
            if (val && val.status) {
                var result = '';
                $scope.statusQueue.forEach(function (item) {
                    if (val.status == item.value) {
                        result = item.key;
                    }
                });         
                return result;  
            }
        }
        
        var statusPayments = function (val) {
            if (val && (val.payment_status || val.payment_status == 0)) {
                var result = '';
                $scope.statusPayments.forEach(function (item) {
                    if (val.payment_status == item.value) {
                        result = item.key;
                    }
                });         
                return result;  
            }
        }

        var finalResultOnPoli = function (val) {
            if (val && val.status) {
                var result = '';
                $scope.finalResultOnPoli.forEach(function (item) {
                    if (val.status == item.value) {
                        result = item.key;
                    }
                });         
                return result;  
            }
        }

        $scope.getDoctor = function () {
            $scope.listPoli.forEach(function(item) {
                if (item.id == $scope.temp.poly_id && item.doctors) {
                    $scope.listDoctor = item.doctors;
                }
            });
        }

        var listPoli = function () {
            return ServicesCommon.getPolies().$promise
            .then(function (result) {
                var dataDoctor = [];
                $scope.listPoli = result.datas.polies;

                if (result.datas && result.datas.polies) {
                    result.datas.polies.forEach(function (val) {
                        if (val.doctors) {
                            val.doctors.forEach(function (item) {
                                dataDoctor.push(item);
                            });
                        }

                        if (val.name.includes($scope.poliType)) {
                            $scope.currentPoli = val;
                        }
                    });
                    $scope.listAllDoctor = dataDoctor;
                }
            });
        }

        var listServices = function () {
            return ServicesCommon.getServices().$promise
            .then(function (result) {
                $scope.services = result.datas.services;
            });
        }

        var getDoctorName = function (staffID) {
            var result = "";
            $scope.listAllDoctor.forEach(function (val) {
                if (val.pivot && val.pivot.staff_id && val.pivot.staff_id == staffID) {
                    result = val.full_name;
                    return;
                }
            });
            return result;
        }

        var getPoliName = function (poliID) {
            var result = "";
            $scope.listPoli.forEach(function (val) {
                if (val && val.id && val.id == poliID) {
                    result = val.name;
                    return;
                }
            });
            return result;
        }

        var getLoketAntrianPoli = function () {
            return ServicesAdmin.getLoketAntrianList({type: $scope.poliType}).$promise
            .then(function (result) {
                var dataArray = [];
                result.datas.kiosks.forEach(function (item) {
                    item.displayedStatus = statusOnQueue(item);
                    item.displayedQueue = tripleDigit(item.queue_number);
                    if (item.reference && item.reference.register && item.reference.register.patient) {
                        var dateBirth = moment(item.reference.register.patient.birth, 'DD/MM/YYYY');
                        item.displayedBirth = dateBirth.format('DD MMMM YYYY');
                        item.displayedAge = moment().diff(dateBirth, 'years');
                        item.displayedGender = genderToString(item.reference.register.patient.gender);
                    }
                    if (item.reference) {
                        item.displayedDoctor = getDoctorName(item.reference.staff_id);
                        item.displayedPoli = getPoliName(item.reference.poly_id);
                    }

                    item.reference.medical_records.forEach(function (val, key) {
                        item.reference.medical_records[key].listICD10 = JSON.parse(val.icd10);
                    });

                    dataArray.push(item);
                });
                $scope.antrianPoliUmum = dataArray;

                // var datatableSettings = $('#example').DataTable();        
                // datatableSettings.ajax.reload();
            });
        }

        var getVisitor = function () {
            return ServicesAdmin.getVisitor({type: $scope.poliType}).$promise
            .then(function (result) {
                var dataArrayOld = [];
                result.datas.patients.forEach(function (item) {
                    item.displayedFinalStatus = finalResultOnPoli(
                        item.registers[item.registers.length - 1].references[item.registers[item.registers.length - 1].references.length - 1]
                    );

                    var dateBirth = moment(item.birth, 'DD/MM/YYYY');
                    item.displayedAge = moment().diff(dateBirth, 'years');
                    item.displayedBirth = dateBirth.format('DD MMMM YYYY');
                    item.displayedGender = genderToString(item.gender);
                    item.displayedJob = jobToString(item.job);

                    if (item.reference) {
                        item.displayedDoctor = getDoctorName(item.reference.staff_id);
                        item.displayedPoli = getPoliName(item.reference.poly_id);
                    }

                    item.registers.forEach(function (val, key) {
                        item.registers[key].displayedPaymentStatus = statusPayments(val);
                        val.references.forEach(function (vals, keys) {
                            item.registers[key].references[keys].displayedStatus = finalResultOnPoli(vals);
                        });
                    });
                    dataArrayOld.push(item);
                });
                $scope.getLoketAntrianPoliOld  = dataArrayOld;
                // var datatableSettings = $('#example').DataTable();        
                // datatableSettings.ajax.reload();
            });
        }

        var getDefaultValues = function() {
            return $http.get('views/config/defaultValues.json').then(function(data) {
                $scope.finalResultOnPoli = data.data.finalResultOnPoli;
                $scope.statusPayments = data.data.statusPayments;
                $scope.statusQueue = data.data.statusQueue;
                $scope.gender = data.data.gender;
                $scope.job = data.data.listJobs;
            });
        };

        $scope.getICD = function () {
            if (!$scope.temp.medrec.icd10) {
                $scope.temp.medrec.icd10 = [];
            }

            var params = {
                data: $scope.temp.medrec.query,
                limit: 20
            };

            return ServicesAdmin.getICD(params).$promise
            .then(function(data) {
                $scope.icd10 = data.datas.icd10s.data;

                hideICDSelected();
            });
        }

        var hideICDSelected = function () {
            angular.forEach($scope.icd10, function (val) {
                $scope.temp.medrec.icd10.forEach(function (v) {
                    if (v.code === val.code) {
                        val.selected = true;
                    }
                });
            });
        }

        $scope.removeICDItem = function (index) {
            $scope.temp.medrec.icd10.splice(index, 1);
        }

        $scope.getICDItem = function (item) {
            $scope.temp.medrec.icd10.push(item);

            hideICDSelected();
        }

        function webWorker () {
            getLoketAntrianPoli()
            .then(getVisitor)
            .then(function () {
                setTimeout(webWorker, 5000);
            })
        }

        var firstInit = function () {
            $scope.poliType = toTitleCase(
                window.location.pathname
                .replace("/","")
                .replace("_"," ")
            );

            initTemp();
            getDefaultValues()
            .then(listServices)
            .then(listPoli)
            .then(webWorker)
        }
        
        firstInit();

        var updateStatusToCalling = function (type, id) {
            var type = type;
            var params = {
                id: id
            }
            ServicesAdmin.updateLoketAntrianStatus(params).$promise
            .then(function (result) {
                getLoketAntrianPoli();
            });
        }

        $scope.callQueue = function (type, queue, name, id) {
            var typeVoice = "Indonesian Female";
            var type = type;
            var queue = queue;
            var name = name;
            var id = id;

            function panggilanLoket () {
                responsiveVoice.speak("Pasien " + type.toUpperCase() + " ke loket pendaftaran", typeVoice, {rate: 1});
            }
            function panggilanAntrian () {
                responsiveVoice.speak("'" + queue + "'" + name, typeVoice, {rate: 0.75, volume: 1.5, onend: panggilanLoket});
            }
            
            responsiveVoice.speak("Nomor antrian ", typeVoice, {rate: 1, onend: panggilanAntrian});

            updateStatusToCalling(type, id);
        }

        $scope.openModal = function (target, type, data, idx) {
            if ([
                "medicalRecordModal", 
                "suratSakitModal"
                ].indexOf(target) === -1) {
                initTemp();
            }

            var cssModal = '';
            if (type) {
                cssModal = 'modal-' + type;
            }

            if (data) {
                $scope.dataOnModal = data;            
                $scope.dataOnModal.idx = idx;            
            }

            return ngDialog.open({
                template: target,
                scope: $scope,
                className: 'ngDialog-modal ' + cssModal,
                closeByDocument: false
            });
        }

        $scope.printArea = function (divID) {
            if (!$scope.temp.duration) {
                $scope.temp.duration = 0;
            }
            $scope.temp.endDate = moment($scope.temp.startDate).add('days', $scope.temp.duration).format('DD-MM-YYYY');
            if (divID == "printSuratSakit") {
                $scope.temp.displayedJob = jobToString($scope.dataOnModal.reference.register.patient.job);
            }
            $scope.todayDate = moment().format('DD MMMM YYYY');
            setTimeout(function(){
                var printContents = document.getElementById(divID).innerHTML;
                var popupWin = window.open('', '_blank', 'width=800, height=600');
                popupWin.document.open();
                popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + printContents + '</body></html>');
                popupWin.document.close();
            }, 500);
        } 

        $scope.editPasien = function (dataPasien) {
            
        }

        $scope.createCheckUp = function () {
            var service_ids = [];
            var service_amounts = [];

            $scope.temp.listServices.forEach(function (val) {
                service_ids.push(val.service_id);
                service_amounts.push(val.service_amount);
            });
    
            var params = {
                kiosk_id: $scope.dataOnModal.id,
                reference_id: $scope.dataOnModal.reference_id,
                poly_id: $scope.temp.poliID,
                doctor_id: $scope.temp.doctor_id,
                service_ids: service_ids,
                service_amounts: service_amounts,
                status: $scope.temp.finalResult,
                notes: $scope.temp.notes
            };

            ServicesAdmin.createPenataJasaPeriksa(params).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    $scope.message = result.message;
                    return;
                }

                initTemp();
                ngDialog.closeAll();
                getLoketAntrianPoli();
            });
        }

        $scope.removeService = function (idx) {
            $scope.temp.listServices.splice(idx, 1);
        }

        $scope.addService = function () {
            var countService = $scope.temp.listServices.length;
            if (!$scope.services[countService]) {
                return;
            }

            var initAmount = 1;
            var initCost = $scope.services[countService].cost;
            var initID = $scope.services[countService].id;

            var addService = {
                cost: initCost,
                service_id: initID,
                service_amount: initAmount,
                service_total: initAmount * initCost
            };

            $scope.temp.listServices.push(addService);
        }
        
        $scope.setService = function (idx) {
            var result = {};
            $scope.services.forEach(function (item) {
                if (item.id == $scope.temp.listServices[idx].service_id) {
                    return result = item;
                };
            });

            $scope.temp.listServices[idx].cost = result.cost;
            $scope.temp.listServices[idx].service_total = result.cost * $scope.temp.listServices[idx].service_amount;
        }

        $scope.setTotal = function (idx) {
            $scope.temp.listServices[idx].service_total = $scope.temp.listServices[idx].service_amount * $scope.temp.listServices[idx].cost;
        }

        $scope.createMedicalRecord = function () {    
            $scope.createMedicalRecorderror = '';
            var idx = $scope.dataOnModal.idx;
            var icd = [];
            $scope.temp.medrec.icd10.forEach(function (val) {
                icd.push(val.code);
            });

            var data = {
                reference_id: $scope.dataOnModal.reference_id,
                anamnesa: $scope.temp.medrec.anamnesa,
                diagnosis: $scope.temp.medrec.diagnosis,
                explain: $scope.temp.medrec.explain,
                therapy: $scope.temp.medrec.therapy,
                notes: $scope.temp.medrec.notes,
                icd10: icd
            }

            ServicesAdmin.postMedicalRecord(data).$promise
            .then(function (result) {
                if (!result.isSuccess) {
                    return $scope.createMedicalRecorderror = result.message;
                };

                getLoketAntrianPoli()
                .then(function () {
                    $scope.temp.medrec = {};
                    $scope.dataOnModal = $scope.antrianPoliUmum[idx];
                });
            });
        }
    });
