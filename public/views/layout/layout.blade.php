@extends('index')
@section('css')
    <link rel="stylesheet" href="views/layout/layout.css">
@endsection
@section('view')
    <div class="module-left-aside">
        @yield('module-title')
        <div class="module-left-container">
            <div class="module-left-nav clearfix">
                <div class="module-left-sidebar sidebar">                       
                    @yield('nav')
                </div>
            </div>
        </div>
    </div>
    <div class="module-content-container">
        @yield('module-content-container')
        @yield('content')
    </div>
@endsection
@section('scripst')
    <script src="views/layout/layout.js"></script>
@endsection
