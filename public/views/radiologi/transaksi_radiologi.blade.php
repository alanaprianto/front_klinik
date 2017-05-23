@extends('layout.layout')
@section('title')
<title>Radiologi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/lab.png">
    <span>Radiologi</span>
</div>
@endsection
@section('nav')
    @include('layout.navRadiologi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Transaksi Langsung</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
<div class="row no-margin no-padding">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#TrLangsung" 
                aria-controls="TrLangsung" 
                role="tab" data-toggle="tab">Transaksi Langsung</a>
        </li>
        <li role="presentation">
            <a href="#riwayat" aria-controls="riwayat" role="tab" data-toggle="tab">Riwayat</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" ng-controller="TransaksiRadiologiCtrl" >
        <div role="tabpanel" class="tab-pane active" id="TrLangsung">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="border-bottom: 2px solid #B3B3B3">
                        <div class="col-md-4">
                            <div class="form-group field row text-left">
                                <div class="col-sm-4">
                                    <b>Nama Pasien</b>
                                </div>
                                <div class="col-sm-8">
                                    <input 
                                        type="text" 
                                        class="form-control input-sm"
                                        ng-model="temp.patient_name">
                                </div>
                            </div>
                            <div class="form-group field row text-left">
                                <div class="col-sm-4">
                                    <b>Alamat</b>
                                </div>
                                <div class="col-sm-8">
                                    <textarea 
                                        class="form-control" 
                                        name="address"
                                        ng-model="temp.patient_address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group field row text-left">
                                <div class="col-sm-4">
                                    <b>Nama DPJP</b>
                                </div>
                                <div class="col-sm-8">
                                    <select 
                                        class="form-control m-b"
                                        ng-model="temp.patient_dpjp"
                                        ng-options="d as d.full_name for d in listDoctor">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group field row text-left">
                                <div class="col-sm-4">
                                    <b>Nama Pelaksana</b>
                                </div>
                                <div class="col-sm-8">
                                    <select 
                                        class="form-control m-b" 
                                        ng-model="temp.patient_executor"
                                        ng-options="d as d.full_name for d in listDoctor">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-15" style="height: 100%; position: fixed; width: 100%; left: 10px; padding-left: 250px;">
                <div class="col-md-12" style="max-height: 60%; overflow: auto;">
                    <table id="service-table" class="table service-table">
                        <thead>
                            <tr>
                                <th>
                                    <button type="button"
                                        class="btn btn-primary btn-xs"
                                        ng-click="addService()"
                                        ng-hide="temp.listServices.length == services.length">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </th>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Biaya Layanan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="l in temp.listServices">
                                <td>
                                    <button type="button"
                                        class="btn btn-danger btn-xs"
                                        ng-click="removeService($index)">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </td>
                                <td>[[$index + 1]]</td>
                                <td>
                                    <select class="form-control condition"
                                        ng-model="l.service_id"
                                        ng-change="setService($index)"
                                        ng-options="s.id as s.name for s in services">
                                    </select>
                                </td>
                                <td>[[temp.listServices[$index].cost | currency]]</td>
                                <td class="col-sm-2">
                                    <input type="number"
                                        step="1" 
                                        min="0"
                                        class="form-control" 
                                        ng-model="l.service_amount"
                                        ng-change="setSubTotal($index)">
                                </td>
                                <td>[[temp.listServices[$index].service_total | currency]]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="bottom: 0; position: fixed; width: 100%; left: 0; padding-left: 265px;">
                <div class="col-md-3" style="background-color:#FE8A71; color: #ffffff">
                    <p>Total Tagihan </p>
                    <div class="pull-right">
                        <h2> [[setTotal()|currency]]</h2>
                    </div>
                </div>
                <div class="col-md-9" style="background-color:#72CCCA; color: #ffffff;">
                    <div class="pull-right col-md-4" style="padding: 14.5px">
                        <button 
                            class="btn btn-default no-radius col-md-12"
                            ng-click="openModal('pembayaranModal', 'tambah')">
                            Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="riwayat">
            
        </div>
    </div>
</div>

    <script type="text/ng-template" id="pembayaranModal">
        <div class="row p-b-15">
            <h4 class="modal-title">[[temp.titlePembayaran]]</h4>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4">
                            <b>Nama Pasien</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.patient_name]]
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4">
                            <b>Alamat</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.patient_address]]
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4">
                            <b>Nama DPJP</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.patient_dpjp]]
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4">
                            <b>Nama Pelaksana</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.patient_executor]]
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-15">
                <div class="col-md-12">                
                    <table id="service-table" class="table service-table">
                        <thead>
                            <tr>                                
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Biaya Layanan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="l in temp.listServices">                                
                                <td>[[$index + 1]]</td>
                                <td>[[l.service_id]]</td>
                                <td>[[l.cost | currency]]</td>
                                <td class="col-sm-2">[[l.service_amount]]</td>
                                <td>[[l.service_total | currency]]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <table class="table table-payment">
                    <thead>
                        <tr>
                            <th class="text-left"><b>Total</b></th>
                            <th class="text-right"><b>[[temp.totalPayment | currency]]</b></th>
                        </tr>
                        <tr ng-hide="dataOnModal.payment_status == 1">
                            <th class="text-left"><b>Payments</b></th>
                            <th class="text-right col-md-4">
                                <input 
                                    type="text" 
                                    class="form-control hidden-print"
                                    name="payment"
                                    ng-model="temp.payment"
                                    ng-change="countPayments()">
                                <b class="displayOnPrint">[[temp.payment | currency]]</b>
                            </th>
                        </tr>
                        <tr ng-hide="dataOnModal.payment_status == 1">
                            <th class="text-left"><b>Diverentiation</b></th>
                            <th class="text-right col-md-4">
                                <input
                                    type="text"
                                    class="form-control hidden-print"
                                    name="diff"
                                    ng-model="temp.diff"
                                    readonly="true">
                                <b class="displayOnPrint">[[temp.diff]]</b>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row p-b-15 no-margin">
            <div class="col-md-3 pull-right" ng-hide="dataOnModal.payment_status == 1">
                <button 
                    class="btn btn-info col-md-12 no-radius pull-right" 
                    ng-click="createPOS()"
                    ng-disabled="temp.diff=='-'|| temp.totalPayment<=0">Bayar</button>
            </div>
            <!-- <div class="col-md-3 pull-right">
                <button class="btn btn-default col-md-12 no-radius pull-right"
                    ng-click="printArea('printKasir')">
                    <i class="fa fa-print"></i> Print
                </button>
            </div> -->
        </div>
    </script>
@endsection
@section('scripts')
<script src="views/radiologi/transaksi_radiologi.js"></script>
@endsection
