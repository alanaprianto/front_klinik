@extends('index')
@section('css')
    <link rel="stylesheet" href="views/inventori/inventori.css">
@endsection
@section('view')
    @include('sidebar.sidebar')
    <div id="Inventori-area" ng-controller="InventoriCtrl" class="module-content-container">
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button class="btn btn-info col-md-3 no-radius"> Staff</button>
                <button class="btn btn-info col-md-3 no-radius"> Staff Job </button>
                <button class="btn btn-info col-md-3 no-radius"> Staff Position</button>
                <button class="btn btn-info col-md-3 no-radius"> Jasa Dokter</button>
            </div>
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Explain</th>
                            <th>Kategori</th>
                            <th>Sedian</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="inventori in tableListInventori">
                            <td>[[$index + 1]]</td>
                            <td>[[inventori.name]]</td>
                            <td>[[inventori.explain]]</td>
                            <td>[[inventori.category]]</td>
                            <td>[[inventori.sediaan]]</td>
                            <td>[[inventori.type]]</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="views/inventori/inventori.js"></script>
@endsection