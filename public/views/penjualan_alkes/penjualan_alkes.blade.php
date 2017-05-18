@extends('layout.layout')
@section('title')
<title>Farmasi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Apotek</span>
</div>
@endsection
@section('nav')
    @include('layout.navFarmasi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Penjualan Langsung Apotek</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div class="row no-margin no-padding">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#Penjualan" 
                    aria-controls="Penjualan" 
                    role="tab" data-toggle="tab">Penjualan</a>
            </li>
            <li role="presentation">
                <a href="#riwayat" aria-controls="riwayat" role="tab" data-toggle="tab">Riwayat</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" ng-controller="PenjualanAlkesCtrl" >
            <div role="tabpanel" class="tab-pane active" id="Penjualan">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12" style="border-bottom: 2px solid #B3B3B3">
                            <div class="col-md-4">
                                <div class="form-group field row text-left">
                                    <div class="col-sm-4">
                                        <b>No. Ref</b>
                                    </div>
                                    <div class="col-sm-8">
                                        201705180001
                                    </div>
                                </div>
                                <div class="form-group field row text-left">
                                    <div class="col-sm-4">
                                        <b>Tanggal</b>
                                    </div>
                                    <div class="col-sm-8">
                                        2017/05/18
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group field row text-left">
                                    <div class="col-sm-4">
                                        <b>Pelanggan</b>
                                    </div>
                                    <div class="col-sm-8">
                                        Cari Pelanggan
                                    </div>
                                </div>
                                <div class="form-group field row text-left">
                                    <div class="col-sm-4">
                                        <b>Petugas</b>
                                    </div>
                                    <div class="col-sm-8">
                                        Alan Budikusuma
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form style="padding-bottom: 10px; margin-top: -10px;">
                                    <div class="input-group">
                                        <input id="individualDrop"
                                            type="text" 
                                            class="form-control input-sm" 
                                            data-toggle="dropdown"
                                            placeholder="Nama Barang" 
                                            ng-model="temp.searchParam">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                        <ul class="dropdown-menu col-md-12" role="menu" aria-labelledby="individualDrop">
                                            <li role="presentation" ng-repeat="resItem in inventories | filter:{name: temp.searchParam}">
                                                <a role="menuitem" ng-click="addItem(resItem)">[[resItem.name]]</a>
                                            </li>
                                        </ul>
                                     </div>
                                </form>
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="No. PLU">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-b-15" style="height: 100%; position: fixed; width: 100%; left: 10px; padding-left: 250px;">
                    <div class="col-md-12" style="max-height: 60%; overflow: auto;">
                        <table class="table table-po">
                            <thead>
                                <tr>                                    
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Diskon (%)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="l in temp.listItems track by $index">                                    
                                    <td class="col-sm-1">
                                        [[$index + 1]]
                                    </td>
                                    <td class="col-sm-3">
                                        [[l.name]]
                                    </td>
                                    <td>
                                        <input type="number"
                                            step="1" 
                                            min="0"
                                            class="form-control input-sm" 
                                            ng-model="l.qty"
                                            ng-keypress="l.sub_total = l.sell_price * l.qty"
                                            ng-mouseleave="l.sub_total = l.sell_price * l.qty"
                                            ng-init="l.sub_total = l.sell_price">
                                    </td>
                                    <td class="col-sm-1">
                                        [[l.sediaan]]
                                    </td>
                                    <td>[[l.sell_price | currency]]</td>
                                    <td>
                                        0
                                    </td>
                                    <td>[[l.sub_total | currency]]
                                        <button type="button"
                                            class="btn btn-danger btn-xs"
                                            ng-click="removePO($index)">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </td>
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
                <div class="col-md-6">                    
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>No. Ref</b>
                        </div>
                        <div class="col-sm-8">
                            201705180001
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Tanggal</b>
                        </div>
                        <div class="col-sm-8">
                            2017/05/18
                        </div>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Pelanggan</b>
                        </div>
                        <div class="col-sm-8">
                            Cari Pelanggan
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Staff</b>
                        </div>
                        <div class="col-sm-8">
                            Alan Budikusuma
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-15">
                <div class="col-md-12">
                    <table class="table table-po">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Diskon (%)</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="l in temp.listItems track by $index">
                                <td class="col-sm-1">
                                    [[$index + 1]]
                                </td>
                                <td class="col-sm-3">
                                    [[l.name]]
                                </td>
                                <td>
                                    [[l.qty]]
                                </td>
                                <td class="col-sm-1">
                                    [[l.sediaan]]
                                </td>
                                <td>[[l.sell_price | currency]]</td>
                                <td>
                                    0
                                </td>
                                <td>[[l.sub_total | currency]]</td>
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
<script src="views/penjualan_alkes/penjualan_alkes.js"></script>
@endsection
