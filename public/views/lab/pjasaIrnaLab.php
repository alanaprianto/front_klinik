@extends('layout.layout')
@section('title')
<title>Laboratorium .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/lab.png">
    <span>Laboratorium</span>
</div>
@endsection
@section('nav')
    @include('layout.navLab')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Penata Jasa Rawat Inap</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div class="row no-margin no-padding">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#antrianHariIni" 
                        aria-controls="antrianHariIni" 
                        role="tab" data-toggle="tab">Antrian Hari Ini</a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riwayat</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="antrianHariIni">
                    <br>
                    <div class="col-md-12">
                        <table id="example" 
                            class="ui teal celled table compact display nowrap" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>                           
                                    <th>Antrian</th>
                                    <th>No. Medrec</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Poli Awal</th>
                                    <th>Dokter</th>
                                    <th>Tipe Layanan</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="a in antrianPoliUmum">
                                    <td>[[a.displayedQueue]]</td>
                                    <td>[[a.reference.register.patient.full_name]]</td>
                                    <td>[[a.displayedGender]]</td>
                                    <td>[[a.displayedDoctor]]</td>
                                    <td>[[a.displayedStatus]]</td>
                                    <td>
                                        <button class="btn btn-default btn-xs"
                                            ng-click="callQueue(
                                                a.type, 
                                                a.queue_number, 
                                                a.reference.register.patient.full_name, 
                                                a.id
                                            )">
                                            <i class="fa fa-bullhorn"></i>
                                        </button>
                                        <span> | </span>
                                        <button class="btn btn-warning btn-xs"
                                            ng-click="openModal('editPasienModal', 'lg', a, $index)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="profile">
                    <br>
                    <div class="col-md-12">
                        <table id="example" 
                            class="ui teal celled table compact display nowrap" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Rekam Medis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kesimpulan Akhir</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="a in getLoketAntrianPoliOld ">
                                    <td>[[$index + 1]]</td>
                                    <td>[[a.number_medical_record]]</td>
                                    <td>[[a.full_name]]</td>
                                    <td>[[a.displayedGender]]</td>
                                    <td>[[a.displayedFinalStatus]]</td>
                                    <td>
                                        <button class="btn btn-default btn-xs"
                                            ng-click="openModal('detailPasienModal', 'lg', a, $index)">
                                            <i class="fa fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
<script src="views/staff/staff.js"></script>
@endsection
