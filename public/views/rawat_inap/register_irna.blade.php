@extends('layout.layout')
@section('title')
<title>Rawat Inap .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/dataPasien.png">
    <span>Rawat Inap</span>
</div>
@endsection
@section('nav')
    @include('layout.navRawatInap')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Pendaftaran Rawat Inap</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
   <div id="pendaftaranPasien-area" ng-controller="RegisterIRNACtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('tambahPasienModal')"> Pendaftaran</button>
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
                            <th>Alamat</th>
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

        @include('layout.modalPendaftaranIrna')
        
    </div>
@endsection
@section('scripts')
<script src="views/rawat_inap/register_irna.js"></script>
@endsection
