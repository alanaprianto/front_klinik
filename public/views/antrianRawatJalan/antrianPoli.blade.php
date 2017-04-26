@extends('layout.layout')
@section('title')
<title>Rawat Jalan .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Rawat Jalan </span>
</div>
@endsection
@section('nav')
    @include('layout.navRawatJalan')
@endsection
@section('module-content-container')
    
@endsection
@section('content')
    <div id="antrian-area" ng-controller="AntrianCtrl">
        <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <ul>
                    <h3>Antrian [[poliType]]</h3>
                </ul>
            </div>
        </nav>

        <div class="row no-margin">
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Dokter</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="a in antrianPoliUmum">
                            <td>[[a.displayedQueue]]</td>
                            <td>[[a.reference.register.patient.full_name]]</td>
                            <td>[[a.displayedGender]]</td>
                            <td>[[a.displayedDoctor]]</td>
                            <td>[[a.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-default btn-xs"
                                    ng-click="callQueue(
                                        a.type, 
                                        a.queue_number, 
                                        a.reference.register.patient.full_name, 
                                        a.id
                                    )">
                                    <i class="fa fa-bullhorn"></i>
                                </button>
                                <span> | </span>
                                <button class="btn btn-warning btn-xs"
                                    ng-click="openModal('editPasienModal', 'lg', a)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hide">
            <div id="printSuratSakit">
                <h2 align="center"><u>SURAT KETERANGAN SAKIT</u></h2>
                <p align="left">Yang bertanda tangan dibawah ini menerangkan bahwa:</p>
                <p align="justify">
                    Nama        : <b>[[dataOnModal.reference.register.patient.full_name]]</b> <br>
                    Alamat      : <b>[[dataOnModal.reference.register.patient.address]]</b><br>
                    Pekerjaan   : <b>[[dataOnModal.reference.register.patient.job]]</b><br>
                </p>
                <p align="justify">perlu istirahat karena sakit, selama <b>[[temp.duration]]</b> hari. Terhitung tanggal <b>[[temp.startDate|date:'dd-MM-yyyy']]</b> s/d <b>[[temp.endDate]]</b></p>
                <p align="left">Harap yang berkepentingan maklum.</p>
                <p align="right">
                    Bandung, [[todayDate]].<br>
                    Dokter<br>            
                    <hr>
                </p>
            </div>
        </div>

        <script type="text/ng-template" id="editPasienModal">
            <div class="row p-b-15">
                <h4 class="modal-title">
                    Pasien [[dataOnModal.reference.register.patient.full_name]]
                </h4>
            </div>
            <div class="row p-b-15">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>No RM</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.number_reference]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nama Lengkap</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.register.patient.full_name]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>TTL / Umur</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedBirth]] / <b>[[dataOnModal.displayedAge]]</b> tahun</p>
                            </div>
                        </div>

                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Jenis Kelamin</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedGender]]</p>
                            </div>
                        </div>
                         <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Alamat</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.register.patient.address]]</p>
                            </div>
                        </div>
                         <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nomber Handpone</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.register.patient.phone_number]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Dokter</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedDoctor]]</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-6 no-padding">
                        <h3>Tambah Tindakan</h3>
                        <button class="btn btn-primary btn-plus" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                        <table class="table service-table" id="service-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Biaya Layanan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                          <button class="btn btn-info col-md-4 no-radius pull-right" 
                            ng-clik="openModal('medicalRecordModal')">
                            Medical Record
                        </button>
                        <div class="col-md-1 pull-right"></div>
                        <button class="btn btn-default col-md-3 no-radius pull-right" 
                            ng-click="openModal('suratSakitModal')">
                            Surat Sakit
                        </button>
                    </div>
                </div>
            </div>
        </script>

         <script type="text/ng-template" id="medicalRecordModal">
            <div class="row p-b-15">
                <h4 class="modal-title">
                    Medical Record
                </h4>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Anamnesa</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Diagnosis</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Explain</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Therapy</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text"                 
                                class="form-control" 
                                ng-model="">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Notes</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Perlu Istirahat Selama</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="number"
                                step="1" 
                                min="0"
                                class="form-control" 
                                ng-model="temp.duration">
                        </div>
                        <div class="col-sm-6 no-padding">
                            <p style="margin-top: 5px">Hari</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Terhitung dari Tanggal</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" 
                                class="form-control" 
                                ng-model="temp.startDate">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <button class="btn btn-default col-md-4 no-radius pull-right"
                        ng-click="printArea('printSuratSakit')">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
        </script>

        <script type="text/ng-template" id="suratSakitModal">
            <div class="row p-b-15">
                <h4 class="modal-title">
                    Surat Keterangan Sakit
                </h4>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Nama</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="dataOnModal.reference.register.patient.full_name">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Umur</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="dataOnModal.displayedAge">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="dataOnModal.displayedGender">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Pekerjaan</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text"                 
                                class="form-control" 
                                ng-model="dataOnModal.reference.register.patient.job">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Alamat</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="dataOnModal.reference.register.patient.address">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Perlu Istirahat Selama</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="number"
                                step="1" 
                                min="0"
                                class="form-control" 
                                ng-model="temp.duration">
                        </div>
                        <div class="col-sm-6 no-padding">
                            <p style="margin-top: 5px">Hari</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Terhitung dari Tanggal</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" 
                                class="form-control" 
                                ng-model="temp.startDate">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <button class="btn btn-default col-md-4 no-radius pull-right"
                        ng-click="printArea('printSuratSakit')">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
        </script>
    </div>
@endsection
@section('scripts')
<script src="views/antrianRawatJalan/antrianPoli.js"></script>
@endsection
