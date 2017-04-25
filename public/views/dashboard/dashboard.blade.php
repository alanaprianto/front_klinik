@extends('index')
@section('css')
    <link rel="stylesheet" href="views/dashboard/dashboard.css">
@endsection
@section('view')
    @include('sidebar.sidebar')
    <div id="dashboard-area" ng-controller="DashboardCtrl" class="module-content-container">
        <div class="container" style="text-align: justify">
            <div class="center">
                <img alt="image" src="assets/images/logo/logo.png" style="height: 150px ">
                <h1 id="title">[[dataUser.hospitals.name]]</h1>
                <p ng-show="!dataUser.staff.address"><i>No Address</i></p>
                <p ng-show="dataUser.staff.address">[[dataUser.staff.address]]</p>
                <button type="button" href"="  class="btn btatn-info">Ubah Profile</button>
              
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="views/dashboard/dashboard.js"></script>
@endsection