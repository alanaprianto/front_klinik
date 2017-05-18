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
                <h3>Transfer Antar Depo</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="inventory-area" ng-controller="TransferDepoCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('crupTransferDepoModal', 'tambah')">
                    Transfer Stok
                </button>
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Transaksi</th>
                            <th>Depo Asal</th>
                            <th>Depo Tujuan</th>
                            <th>Staff</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="trDepo in tableListTrDepos">
                            <td>[[$index + 1]]</td>
                            <td>[[trDepo.number_transaction]]</td>
                            <td>[[getDepoObj(trDepo.from_depo_id).desc]]</td>
                            <td>[[getDepoObj(trDepo.to_depo_id).desc]]</td>
                            <td>[[trDepo.staff.full_name]]</td>
                            <td>[[trDepo.status]]</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-warning"
                                    ng-show="trDepo.status!=3"
                                    ng-click="openModal('crupTransferDepoModal', 'detail', trDepo)">
                                        Detail Transfer
                                </button>                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/ng-template" id="crupTransferDepoModal">
        <div class="row p-b-15">
            <h4 class="modal-title">[[temp.titleCrEdTrDepo]]</h4>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <h4>Depo Asal</h4>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.typecredTrDepo=='tambah'">
                        <div class="col-sm-4 no-padding">
                            <b>Pilih Depo</b>
                        </div>
                        <div class="col-sm-8">
                            <select
                                class="form-control m-b"
                                ng-model="temp.depo_src"
                                ng-change="selectSrc()"
                                ng-options="d as d.desc for d in listDepos">
                            </select>
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.depo_src">
                        <div class="col-sm-4 no-padding">
                            <b>Nama Depo</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.depo_src.name]]
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.depo_src">
                        <div class="col-sm-4 no-padding">
                            <b>Deskripsi</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.depo_src.desc]]
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.depo_src">
                        <div class="col-sm-4 no-padding">
                            <b>Lokasi</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.depo_src.location]]
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field row text-left">
                        <h4>Depo Tujuan</h4>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.typecredTrDepo=='tambah'">
                        <div class="col-sm-4 no-padding">
                            <b>Pilih Depo</b>
                        </div>
                        <div class="col-sm-8">
                            <select
                                class="form-control m-b"
                                ng-model="temp.depo_dest"
                                ng-options="d as d.desc for d in listDepos | filter:{id: '!'+ temp.depo_src.id}">
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.depo_dest">
                        <div class="col-sm-4 no-padding">
                            <b>Nama Depo</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.depo_dest.name]]
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.depo_dest">
                        <div class="col-sm-4 no-padding">
                            <b>Deskripsi</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.depo_dest.desc]]
                        </div>
                    </div>
                    <div class="form-group field row text-left" ng-show="temp.depo_dest">
                        <div class="col-sm-4 no-padding">
                            <b>Lokasi</b>
                        </div>
                        <div class="col-sm-8">
                            [[temp.depo_dest.location]]
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
                                    ng-click="addTrDepo()"
                                    ng-hide="temp.listTrDepos.length == trDepos.length">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                            <th>No</th>
                            <th>Nama Inventory</th>
                            <th>Deskripsi</th>
                            <th>Stok Tersedia</th>
                            <th>Jumlah Transfer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="l in temp.listTrDepos">
                            <td>
                                <button type="button"
                                    class="btn btn-danger btn-xs"
                                    ng-click="removeTrDepo($index)">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </td>
                            <td class="col-sm-1">[[$index + 1]]</td>
                            <td class="col-sm-3">
                                [[temp.listTrDepos[$index].trd_name]]
                            </td>
                            <td>
                                [[temp.listTrDepos[$index].trd_desc]]
                            </td>
                            <td class="col-sm-2">
                                [[temp.listTrDepos[$index].trd_stock]]
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                    step="1" 
                                    min="0"
                                    max="[[temp.listTrDepos[$index].trd_stock]]"
                                    max-to="temp.listTrDepos[$index].trd_stock"
                                    class="form-control" 
                                    ng-model="l.trd_qty">
                            </td>
                        </tr>
                    </tbody>                    
                </table>
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
                ng-show="temp.typecredTrDepo=='tambah'"
                ng-click="createTrDepo()">
                Transfer Barang
            </button>
            <button
                class="btn btn-info col-md-3 no-radius"
                ng-show="temp.typecredTrDepo=='receive'"
                ng-click="createRO()">
                Terima Barang
            </button>
        </div>
    </script>
@endsection
@section('scripts')
<script src="views/transfer_depo/transfer_depo.js"></script>
@endsection
