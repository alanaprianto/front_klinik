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
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Telepon</th>
                            <th>Terakhir Kunjungan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="visitor in tableListPatients | filter: { patient: searchVisitor }">
                            <td>[[$index + 1]]</td>
                            <td>[[visitor.number_medical_record]]</td>
                            <td>[[visitor.full_name]]</td>
                            <td>[[visitor.gender]]</td>
                            <td>[[visitor.age]]</td>
                            <td>[[visitor.phone_number]]</td>
                            <td>[[formatDate(visitor.registers[0].created_at) | date: 'dd MMM yyyy HH:mm']]</td>
                            <td>
                                <button class="btn btn-xs btn-success"
                                    ng-click="openModal('tambahPasienLamaModal', 'lg', visitor)">
                                    Daftarkan Pasien
                                </button>
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
<script src="views/layout/modalPendaftaranIrna.js"></script>
@endsection
