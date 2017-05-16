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
                    ng-click="openModal('credAlkesModal', 'tambah')">
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
@endsection
@section('scripts')
<script src="views/pembelian_alkes/pembelian_alkes.js"></script>
@endsection
