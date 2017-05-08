@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="views/dataPasien/dataPasien.css">
@endsection
@section('view')
    @include('sidebar.sidebar')
    <div id="dataPasien-area" ng-controller="DaftarPasienCtrl" class="module-content-container">
        <div class="row no-margin">
            <div class="col-md-12">
              <div class="col-md-6 no-padding">
                    <div class="col-md-3 no-padding">
                        <p>Search</p>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                            class="form-control"
                            name="search pasien"
                            ng-model="searchPasien.full_name"
                            placeholder="Nama Pasien">
                    </div>
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
                        <tr ng-repeat="visitor in tableListVisitor | filter: { patient: searchPasien }">
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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <script type="text/ng-template" id="detailPasienModal">
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
    </script>
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