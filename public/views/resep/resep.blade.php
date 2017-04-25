@extends('layout.layout')
@section('title')
<title>kepegawaian .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Farmasi</span>
</div>
@endsection
@section('nav')
    @include('layout.navFarmasi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>DATA RESEP</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="resep-area" ng-controller="ResepCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <a class="btn btn-info col-md-3 no-radius" href="{{url('createEditResep')}}"> Tambah Resep </a>
            </div>
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Nomber Resep</th>
                            <th>Poli / Pembeli Luar</th>
                            <th>Tanggal Transaksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="recipes in tableListRecipes">
                            <td>[[$index + 1]]</td>
                            <td></td>
                            <td></td>
                            <td></td>
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
<script src="views/staff/staff.js"></script>
@endsection
