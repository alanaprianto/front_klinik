@extends('layout.layout')
@section('title')
<title>Radiologi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/lab.png">
    <span>Radiologi</span>
</div>
@endsection
@section('nav')
    @include('layout.navRadiologi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Radiologi</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
@endsection
@section('scripts')
<script src="views/staff/staff.js"></script>
@endsection
