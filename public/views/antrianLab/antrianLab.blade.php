@extends('layout.layout')
@section('title')
<title>Lab .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/dataPasien.png">
    <span>Laboratorium</span>
</div>
@endsection
@section('nav')
    @include('layout.navLoket')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Antrian Laboratorium</h3>
            </ul>            
        </div>
    </nav>
@endsection
@section('content')
    <div id="staff-area" ng-controller="AntrianRadiologiCtrl" >
        <div class="row no-margin no-padding">
            <div class="col-md-4">
                <h5>Antrian Laboratorium</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="a in antrianBpjs">
                            <td>[[a.displayedQueue]]</td>
                            <td>[[a.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-default btn-xs"
                                    ng-click="callQueue(a.type, a.queue_number, a.id)">
                                    <i class="fa fa-bullhorn"></i>
                                </button>
                                <span> | </span>
                                <button class="btn btn-warning btn-xs"
                                    ng-click="openModal('tambahPasienModal', 'lg', a)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="hide">
            <div id="printRegister">
                @include('templatePrint.registerPatient')
            </div>
        </div>

        @include('layout.modalPendaftaranPasien')
    </div>
@endsection
@section('scripts')
    <script src="views/antrian/antrian.js"></script>
    <script src="views/layout/modalPendaftaranLab.js"></script>
@endsection
