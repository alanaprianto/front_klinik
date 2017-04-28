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
                            <td>[[k.created_at]]</td>
                            <td>[[k.status]]</td>
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
                           <p class="text-left">[[dataOnModal.patient.age]]</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-left">[[dataOnModal.patient.gender]]</p>
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

            <div class="col-md-12">
                <table class="table table-payment">
                    <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th>Jenis Pembayaran</th>
                        <th>Total Pembayaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="amount"></td>
                            <td>
                                <input type="checkbox"
                                       class="check-payment"
                                       name="">Dibayar

                                <button type="button"
                                        class="btn btn-primary btn-sm accordion-toggle"
                                        data-toggle="collapse"><i
                                        class="fa fa-info"></i></button>

                            </td>
                        </tr>

                            <tr>
                                <th class="hiddenRow">
                                    <div ></div>
                                </th>
                                <th class="hiddenRow">
                                    <div>Nama Tindakan
                                    </div>
                                </th>
                                <th class="hiddenRow">
                                    <div>Jumlah Tindakan
                                        / Harga Per Tindakan
                                    </div>
                                </th>
                                <th class="hiddenRow">
                                    <div>Total</div>
                                </th>
                            </tr>
                           
                                <tr>
                                    <td class="hiddenRow">
                                        <div></div>
                                    </td>
                                    <td class="hiddenRow">
                                        <div></div>
                                    </td>
                                    <td class="hiddenRow">
                                        <div>
                                            x Tindakan / Rp.</div>
                                    </td>
                                    <td class="hiddenRow">
                                        <div>
                                            Rp.</div>
                                    </td>
                                </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th><span
                                        class="remaining"></span></th>
                            <th class="text-right">Total : Rp.</th>
                            <th><input type="checkbox"
                                       class="full_payment" >Lunas
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row p-b-15 no-margin">
            <div class="col-md-12">
                <button class="btn btn-default col-md-4 no-radius pull-right"
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
