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
                <h3>Antrian</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="staff-area" ng-controller="AntrianCtrl" >
        <div class="row no-margin">
            <div class="col-md-4">
                <h5>Antrian BPJS</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="antrian in tableListantrian">
                            <td>[[$index + 1]]</td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h5>Antrian Poli umum</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="antrian in tableListantrian">
                            <td>[[$index + 1]]</td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h5>Antrian Poli Gigi</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="antrian in tableListantrian">
                            <td>[[$index + 1]]</td>
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
<script src="views/antrian/antrian.js"></script>
@endsection
