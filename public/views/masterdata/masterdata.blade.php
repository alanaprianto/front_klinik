@extends('layout.layout')
@section('title')
<title>Master Data .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/master-data.png">
    <span>Master Data </span>
</div>
@endsection
@section('nav')
    @include('layout.navMasterData')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Master Data </h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
@endsection
