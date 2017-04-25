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
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>KUnjungan Poli Umum</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="staff-area" ng-controller="StaffCtrl" >
        <div class="row no-margin">
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Kesimpulan Akhir</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="staff in tableListStaff">
                            <td>[[$index + 1]]</td>
                            <td></td>
                            <td></td>
                            <td></td>                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="views/kunjungan/kunjunganPoli.js"></script>
@endsection
