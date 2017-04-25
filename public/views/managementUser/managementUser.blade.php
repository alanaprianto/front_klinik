@extends('index')
@section('css')
    <link rel="stylesheet" href="views/managementUser/managementUser.css">
@endsection
@section('view')
    @include('sidebar.sidebar')
    <div id="managementUser-area" ng-controller="ManagementUserCtrl" class="module-content-container">
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Staff Position</th>
                            <th>Staff Job</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="staff in tableListStaff">
                            <td>[[$index + 1]]</td>
                            <td>[[staff.nik]]</td>
                            <td>[[staff.full_name]]</td>
                            <td>[[staff.gender]]</td>
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
    <script src="views/managementUser/managementUser.js"></script>
@endsection