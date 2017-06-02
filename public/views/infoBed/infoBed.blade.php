@extends('layout.layout')
@section('title')
<title>Info Bed .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/rawat-inap.png">
    <span>Info Bed</span>
</div>
@endsection
@section('nav')
    @include('layout.navRawatInap')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Informasi Ketersediaan Bed</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
   <div id="infoBed-area" ng-controller="InfoBedCtrl" >
        <div class="col-md-12 m-b-15">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="input-group">
                            <input id="individualDrop"
                                type="text" 
                                class="form-control input-sm" 
                                data-toggle="dropdown"
                                placeholder="Cari Pasien" 
                                ng-model="temp.searchParam">
                            <div class="input-group-btn">
                                <button class="btn btn-default btn-sm" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <table class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bed</th>
                        <th>Ruangan</th>
                        <th>Kelas Ruangan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="bed in tableListInfoBeds | filter: { full_name: temp.searchParam }">
                        <td>[[$index + 1]]</td>
                        <td>[[bed.bed_name]]</td>
                        <td>[[bed.room_name]]</td>
                        <td>[[bed.room_class]]</td>
                        <td>[[bed.bed_display_avail]]</td>
                        <td>
                            <button 
                                class="btn btn-xs btn-success"
                                ng-show="bed.bed_available"
                                ng-click="openModal('tambahPasienLamaModal', 'lg', patient)">
                                Daftarkan Pasien
                            </button>
                            <button 
                                class="btn btn-xs btn-warning"
                                ng-show="!bed.bed_available"
                                ng-click="openModal('tambahPasienLamaModal', 'lg', patient)">
                                Lihat Pasien
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
@endsection
@section('scripts')
<script src="views/infoBed/infoBed.js"></script>
@endsection