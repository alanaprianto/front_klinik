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
                            <th>Nomor PO</th>
                            <th>Staff</th>
                            <th>Distributor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="po in tableListPOs">
                            <td>[[$index + 1]]</td>
                            <td>[[po.number_transaction]]</td>
                            <td>[[po.staff.full_name]]</td>
                            <td>[[po.distributor.name]]</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-success"
                                    ng-show="po.status!=3"
                                    ng-click="openModal('createPOModal', 'receive', po)">
                                        Receive Order
                                </button>
                                <button
                                    class="btn btn-xs btn-warning"
                                    ng-show="po.status==3"
                                    ng-click="openModal('createPOModal', 'detail', po)">
                                        Detail Order
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
            <h4 class="modal-title">[[temp.titleCrEdPO]]</h4>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <h4>Vendor</h4>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.typecredPO=='tambah'">
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
                <table class="table table-po">
                    <thead>
                        <tr>
                            <th>
                                <button type="button"
                                    class="btn btn-primary btn-xs"
                                    ng-click="addPO()"
                                    ng-hide="temp.listPO.length == purchaseodr.length">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                            <th>No</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="l in temp.listPO">
                            <td>
                                <button type="button"
                                    class="btn btn-danger btn-xs"
                                    ng-click="removePO($index)">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </td>
                            <td class="col-sm-1">[[$index + 1]]</td>
                            <td class="col-sm-3">
                                <select class="form-control condition"
                                    ng-model="l.po_item_id"
                                    ng-change="setPO($index)"
                                    ng-disabled="temp.typecredPO=='detail'"
                                    ng-options="s.id as s.name for s in purchaseodr">
                                </select>
                            </td>
                            <td>[[temp.listPO[$index].po_desc]]</td>
                            <td class="col-sm-1">
                                <input type="number"
                                    step="1" 
                                    min="0"
                                    class="form-control" 
                                    ng-model="l.po_qty"
                                    ng-disabled="temp.typecredPO=='detail'"
                                    ng-change="setTotalPO($index)">
                            </td>
                            <td>[[temp.listPO[$index].po_unit]]</td>
                            <td>[[temp.listPO[$index].po_price]]</td>
                            <td>[[temp.listPO[$index].po_total]]</td>
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
                            [[ temp.subtotal ]]                            
                        </div>
                    </div>
                    <!-- <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Tax</b>
                        </div>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control hidden-print"
                                name="tax"
                                ng-change="setGrandTotals()"
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
                                ng-change="setGrandTotals()"
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
                                ng-change="setGrandTotals()"
                                ng-model="temp.other">
                        </div>
                    </div> -->
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <b>Total</b>
                        </div>
                        <div class="col-sm-8">
                            [[ temp.total ]]
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
                ng-show="temp.typecredPO=='tambah'"
                ng-click="createnewPO()">
                Tambah
            </button>
            <button
                class="btn btn-info col-md-3 no-radius"
                ng-show="temp.typecredPO=='receive'"
                ng-click="createRO()">
                Terima Barang
            </button>
        </div>
    </script>
@endsection
@section('scripts')
<script src="views/pembelian_alkes/pembelian_alkes.js"></script>
@endsection
