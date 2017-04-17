@extends('layout.layout')
@section('title')
<title>Laboratorium .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/lab.png">
    <span>Laboratorium </span>
</div>
@endsection
@section('module-content-container')
<div class="module-content-container">
    <div class="gray-bg sidebar-content">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <ul>
                        <img src="assets/images/logo/logo-md.png" style="height: 15px">
                        <h3>Laboratorium </h3>
                    </ul>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="{{url('login')}}" style="padding: 15px;">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
@endsection
@section('content')
@endsection
