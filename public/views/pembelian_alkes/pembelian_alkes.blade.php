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
                <h3>Pembelian Alkes</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="inventory-area" ng-controller="PembelianAlkesCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('createPOModal', 'tambah')">
                    Tambah PO
                </button>
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Alkes</th>
                            <th>Nama </th>
                            <th>Kategori</th>
                            <th>Tipe</th>
                            <th>Sediaan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="inventory in tableListInventories">
                            <td>[[$index + 1]]</td>
                            <td>[[inventory.code]]</td>
                            <td>[[inventory.name]]</td>
                            <td>[[inventory.inventory_category_id]]</td>
                            <td>[[inventory.type]]</td>
                            <td>[[inventory.sediaan]]</td>
                            <td>[[inventory.explain]]</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('detailAlkesModal', '', inventory)">
                                        <i class="fa fa-id-card"></i>&nbsp;&nbsp;Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/ng-template" id="createPOModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Tambah PO</h4>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <h4>Vendor</h4>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Pilih Vendor</b>
                        </div>
                        <div class="col-sm-8">
                            <select
                                class="form-control m-b"
                                ng-model="temp.vendor"
                                ng-options="d as d.name for d in distributors">
                            </select>
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.vendor">
                        <div class="col-sm-4 no-padding">
                            <b>Nama Vendor</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.vendor.name]]
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.vendor">
                        <div class="col-sm-4 no-padding">
                            <b>Alamat Vendor</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.vendor.address]]
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.vendor">
                        <div class="col-sm-4 no-padding">
                            <b>Kontak Vendor</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.vendor.phone]]
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <h4>Ship To</h4>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-12">
                            Nama Rumah Sakit
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12 no-padding">
                <div class="sub-title col-md-12">
                    <h4 class="text-left no-margin no-padding">[[pp.poly.name]]</h4>
                </div>
                <table class="table table-payment">
                    <thead>
                        <tr>
                            <th class="text-center">Item</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="p in pp.payments">
                            <td class="text-center">[[$index + 1]]</td>
                            <td class="text-center" ng-show="p.service.name">[[p.service.name]]</td>
                            <td class="text-center" ng-hide="p.service.name">[[p.type]]</td>
                            <td class="text-center" ng-show="p.service">[[p.total/p.service.cost]]</td>
                            <td class="text-center" ng-hide="p.service">[[p.total/p.total]]</td>
                            <td class="text-center" ng-show="p.service.cost">[[p.service.cost | currency]]</td>
                            <td class="text-center" ng-hide="p.service.cost">[[p.total | currency]]</td>
                            <td class="text-right">[[p.total | currency]]</td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <h5>Komentar/Spesifikasi Lainnya</h5>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-12">
                            Nama Rumah Sakit
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Subtotal</b>
                        </div>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control hidden-print"
                                name="subtotal"
                                ng-model="temp.subtotal">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Tax</b>
                        </div>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control hidden-print"
                                name="tax"
                                ng-model="temp.tax">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Shipping</b>
                        </div>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control hidden-print"
                                name="shipping"
                                ng-model="temp.shipping">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Other</b>
                        </div>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control hidden-print"
                                name="other"
                                ng-model="temp.other">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Total</b>
                        </div>
                        <div class="col-sm-8">
                            Rp. 4.500.000,00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12 pull-right">
            <div class="col-md-9">
                <div class="bg-warning" style="min-height: 34px;"
                    ng-show="message.crtPO.error">
                    <p class="text-left">
                        [[message.error]]
                    </p>
                </div>
            </div>
            <button
                class="btn btn-info col-md-3 no-radius"
                ng-show="typecredPO=='tambah'"
                ng-click="createnewPO()">
                Tambah
            </button>
        </div>
    </script>
@endsection
@section('scripts')
<script src="views/pembelian_alkes/pembelian_alkes.js"></script>
@endsection
