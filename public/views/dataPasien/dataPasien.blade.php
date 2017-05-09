@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="views/dataPasien/dataPasien.css">
@endsection
@section('view')
    @include('sidebar.sidebar')
    <div id="dataPasien-area" ng-controller="DaftarPasienCtrl" class="module-content-container">
        <div class="row no-margin">
            <div class="col-md-12">
                    <div class="ui icon input pull-right">
                    <input  type="text"  
                            class="form-control" 
                            placeholder="Search Nama Pasien" 
                            ng-model="searchVisitor.full_name">
                     <i class="search icon"></i>
                    </div>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Telepon</th>
                            <th>Terakhir Kunjungan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="visitor in tableListVisitor | filter: { patient: searchVisitor }">
                            <td>[[$index + 1]]</td>
                            <td>[[visitor.number_medical_record]]</td>
                            <td>[[visitor.full_name]]</td>
                            <td>[[visitor.gender]]</td>
                            <td>[[visitor.age]]</td>
                            <td>[[visitor.phone_number]]</td>
                            <td>[[formatDate(visitor.registers[0].created_at) | date: 'dd MMM yyyy HH:mm']]</td>
                            <td>
                                <button class="btn btn-xs btn-default"
                                    ng-click="openModal('detailPasienModal', 'lg', visitor)">
                                    <i class="fa fa-search-plus"></i> Detail Pasien
                                </button>
                                <button class="btn btn-xs btn-default"
                                        ng-click="printArea('printdetailPasien')">
                                 <i class="fa fa-print"></i> Print
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/ng-template" id="detailPasienModal">
            <!--<div class="row p-b-15">
                <h4 class="modal-title">
                    Pasien [[dataOnModal.reference.register.patient.full_name]]
                </h4>
            </div>-->
            <div class="row p-b-15">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>No RM</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.number_medical_record]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nama Lengkap</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.full_name]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>TTL / Umur</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedBirth]] / <b>[[dataOnModal.displayedAge]]</b> tahun</p>
                            </div>
                        </div>

                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Jenis Kelamin</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedGender]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Alamat</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.address]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nomber Handpone</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.phone_number]]</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 text-left">
                        <p><b>History</b></p>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default" ng-repeat="r in dataOnModal.registers | orderBy: 'created_at':true">
                                <div class="panel-heading" role="tab" id="r[[$index]]">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse[[$index]]" aria-expanded="true" aria-controls="collapse[[$index]]">
                                            [[formatDate(r.created_at) | date: 'dd MMM yyyy HH:mm']]
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse[[$index]]" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="r[[$index]]">
                                    <div class="panel-body">

                                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default" ng-repeat="rr in r.references">
                                                <div class="panel-heading" role="tab" id="rr[[$index]]">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapsed[[$parent.$index]]-[[$index]]" aria-expanded="true" aria-controls="collapsed[[$parent.$index]]-[[$index]]">
                                                            [[rr.poly.name]] / [[rr.doctor.full_name]]
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapsed[[$parent.$index]]-[[$index]]" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="rr[[$index]]">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                Nomor Pendaftaran
                                                            </div>
                                                            <div class="col-md-8">
                                                                [[rr.number_reference]]
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                Note
                                                            </div>
                                                            <div class="col-md-8">
                                                                [[rr.notes]]
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table service-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>NO</th> 
                                                                            <th>Tanggal</th> 
                                                                            <th>Anamnesa</th>
                                                                            <th>Diagnosis</th>
                                                                            <th>Explain</th>
                                                                            <th>Therapy</th>
                                                                            <th>Notes</th>
                                                                            <th>ICD10</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="ll in rr.medical_records">
                                                                            <td>[[$index + 1]]</td>
                                                                            <td>[[formatDate(ll.created_at) | date: 'dd MMM yyyy HH:mm']]</td>
                                                                            <td>[[ll.anamnesa]]</td>
                                                                            <td>[[ll.diagnosis]]</td>
                                                                            <td>[[ll.explain]]</td>
                                                                            <td>[[ll.therapy]]</td>
                                                                            <td>[[ll.notes]]</td>
                                                                            <td>[[ll.icd10]]</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>
     <!-- <script type="text/ng-template" id="detailPasienModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Detail Pasien </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-left">Nomor Rekam Medis</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.number_medical_record]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Nama</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.full_name]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Jenis Kelamin</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.gender]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Alamat</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.address]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Nomber Telpon</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.phone_number]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Pekerjaan </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.displayedJob]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Jumlah Pendaftaran </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.registersTotal]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15">
                        <div class="col-md-6">
                            <p class="text-left">Jumlah Kunjungan  </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.referencesTotal]]</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row p-b-15" ng-repeat="ref in dataOnModal.references">
                        <div class="col-md-12">
                            <p class="text-left"><b>Kunjungan [[$index + 1]]</b></p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">Dokter</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[ref.doctor.full_name]]</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">Poli</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[ref.poly.name]]</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">Status</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[ref.displayedStatus]]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-t-15">
            <div class="col-md-6">
            </div>
                <button class="btn btn-default col-md-4 no-radius pull-right"
                        ng-click="printArea('printdetailPasien')">
                        <i class="fa fa-print"></i> Print
                </button>
        </div>
    </script> -->
    <div class="hide">
            <div id="printdetailPasien">
                <h2 align="center"><u>Detail Pasien</u></h2>
                <p align="left">Berikut detail pasien secara keseluruhan </p>
                <p align="justify">
                    Nomor Rekam Medis        : <b>[[dataOnModal.reference.register.patient.number_medical_record]]</b> <br>
                    Nama                     : <b>[[dataOnModal.full_name]]</b> <br>
                    Jenis Kelamin            : <b>[[dataOnModal.full_name]]</b> <br>
                    umur                     : <b>[[]]</b> <br>
                    Nama                     : <b>[[dataOnModal.full_name]]</b> <br>
                    Alamat                   : <b>[[dataOnModal.reference.register.patient.address]]</b><br>
                    Pekerjaan                : <b>[[dataOnModal.reference.register.patient.job]]</b><br>
                </p>
                 <p align="right">
                    Bandung, [[currentDate]].<br>
                    Petugas<br>            
                    <hr>
                </p>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{asset('views/dataPasien/dataPasien.js')}}"></script>
@endsection