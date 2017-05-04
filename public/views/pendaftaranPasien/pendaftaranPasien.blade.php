@extends('layout.layout')
@section('title')
<title>Loket .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/dataPasien.png">
    <span>Loket </span>
</div>
@endsection
@section('nav')
    @include('layout.navLoket')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Pendaftaran Pasien</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="pendaftaranPasien-area" ng-controller="PendaftaranPasienCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('tambahPasienModal')"> Tambah Pasien</button>
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Umur</th>
                            <th>Status Pendaftaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="register in tableListRegister">
                            <td>[[$index + 1]]</td>
                            <td>[[register.register_number]]</td>
                            <td>[[register.patient.number_medical_record]]</td>
                            <td>[[register.patient.full_name]]</td>
                            <td>[[register.patient.age]]</td>
                            <td>[[register.displayedStatus]]</td>
                            <td>
                                <button 
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('tambahRujukanModal', '', register)"
                                    ng-if="register.status == 1">
                                        <i class="fa fa-plus"></i> rujukan
                                </button>
                                <div 
                                    ng-if="register.status != 1">
                                    -
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/ng-template" id="tambahRujukanModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Tambah Rujukan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="row p-b-15">
                            <div class="col-md-4">
                                <p class="text-left">Nomor Pendaftaran</p>
                            </div>
                            <div class="col-md-8">
                                <p class="text-left">[[dataOnModal.register_number]]</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="text-left">Nama</p>
                            </div>
                            <div class="col-md-8">
                                <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row p-b-15" ng-repeat="ref in dataOnModal.references">
                            <div class="col-md-12">
                                <p class="text-left"><b>Kunjungan [[$index + 1]]</b></p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-left">Dokter</p>
                            </div>
                            <div class="col-md-8">
                                <p class="text-left">[[ref.doctor.full_name]]</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-left">Poli</p>
                            </div>
                            <div class="col-md-8">
                                <p class="text-left">[[ref.poly.name]]</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-left">Status</p>
                            </div>
                            <div class="col-md-8">
                                <p class="text-left">[[ref.displayedStatus]]</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group field p-b-15 row">
                            <label class="col-sm-4 no-padding text-left">Klinik</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-control m-b" 
                                    name="poly" 
                                    id="clinic"
                                    ng-model="temp.poly_id"
                                    ng-change="getDoctor($index)">
                                    <option ng-repeat="poli in listPoli" value="[[poli.id]]">[[poli.name]]</option>
                                 
                                </select>
                            </div>
                        </div>
                        <div class="form-group field p-b-15 row">
                            <label class="col-sm-4 no-padding text-left">Nama Dokter</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-control m-b" 
                                    name="doctor" 
                                    id="doctors"
                                    ng-model="temp.doctor_id">
                                    <option ng-repeat="doctor in listDoctor" value="[[doctor.id]]">
                                        [[doctor.full_name]]
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-t-15">
                <div class="col-md-9">
                </div>
                <button 
                    class="btn btn-info col-md-3 no-radius" 
                    ng-click="createTambahRujukan()"
                    ng-disabled="!temp.poly_id">Tambah</button>
            </div>
        </script>

        @include('layout.modalPendaftaranPasien')
        
    </div>
@endsection
@section('scripts')
    <script src="views/pendaftaranPasien/pendaftaranPasien.js"></script>
    <script src="views/layout/modalPendaftaranPasien.js"></script>
@endsection