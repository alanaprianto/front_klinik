@extends('layout.layout')
@section('title')
<title>Kasir .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/pos-framasi.png">
    <span>Kasir</span>
</div>
@endsection
@section('nav')
    @include('layout.navKasir')
@endsection
@section('module-content-container')
<nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Kasir </h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
<div ng-controller="KasirController">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="k in tableListPayment">
                            <td>[[$index + 1]]</td>
                            <td>[[k.patient.number_medical_record]]</td>
                            <td>[[k.patient.full_name]]</td>
                            <td>[[k.displayedCreatedAt]]</td>
                            <td>[[k.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-xs btn-default"
                                    ng-click="openModal('detaiPasienModal', 'lg', k)">
                                    <i class="fa fa-search-plus"></i> Detail Pasien
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/ng-template" id="detaiPasienModal">
        <div class="row p-b-15">
            <h4 class="modal-title">
                Pembayaran
            </h4>
        </div>
        <div class="row p-b-15 no-margin">
            <div class="col-md-12">
                <div class="col-md-6 no-padding">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Nama</label>
                        </div>
                        <div class="col-sm-8">
                           <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Umur</label>
                        </div>
                        <div class="col-sm-8">
                           <p class="text-left">[[dataOnModal.displayedAge]]</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-left">[[dataOnModal.displayedGender]]</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Nomor Rekam Medis</label>
                        </div>
                        <div class="col-sm-8">
                           <p class="text-left">[[dataOnModal.patient.number_medical_record]]</p>
                        </div>
                    </div>

                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>No Askes / Jamkesmas</label>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-left">[[dataOnModal.patient.askes_number]]</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Telepon</label>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-left">[[dataOnModal.patient.phone_number]]</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 no-padding">
                <table class="table table-payment">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">No</th>
                        <th class="text-center">Jenis Pembayaran</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Tarif</th>
                        <th class="text-right">Total Pembayaran</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="p in dataOnModal.payments">
                            <td>[[$index + 1]]</td>
                            <td>[[p.type]]</td>
                            <td></td>
                            <td></td>
                            <td class="text-right">[[p.total]]</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-left">Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right"><b>123</b></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row p-b-15 no-margin">
            <div class="col-md-3 pull-right">
                <button class="btn btn-primary col-md-12 no-radius pull-right"
                    ng-click="createKasirPayments()">
                    Bayar
                </button>
            </div>
            <div class="col-md-3 pull-right">
                <button class="btn btn-default col-md-12 no-radius pull-right"
                    ng-click="printArea('printSuratSakit')">
                    <i class="fa fa-print"></i> Print
                </button>
            </div>
        </div>
    </script>
</div>
@endsection
@section('scripts')
<script src="views/kasir/kasir.js"></script>
@endsection
