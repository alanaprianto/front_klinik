@extends('layout.layout')
@section('title')
<title>Farmasi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Farmasi</span>
</div>
@endsection
@section('nav')
    @include('layout.navFarmasi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Data Obat & Alkes</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="inventory-area" ng-controller="AlkesCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('credAlkesModal', 'tambah')">
                    Tambah Alkes
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
    <script type="text/ng-template" id="detailAlkesModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Detail Alkes</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="row p-b-15">
                            <div class="col-md-6">
                                <p class="text-left">Code Alkes</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.code]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15">
                            <div class="col-md-6">
                                <p class="text-left">Nama Alkes</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.name]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Tipe</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.type]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Explain</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.explain]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15">
                            <div class="col-md-6">
                                <p class="text-left">Sediaan</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.displaySediaan]]</p>
                            </div>
                        </div>
                        <!-- <div class="row p-b-15">
                            <div class="col-md-6">
                                <p class="text-left">Price</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.price]]</p>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-left">Category</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.displayCategory]]</p>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
            <div class="row col-md-12 pull-right">
                <div class="col-md-6">
                    <div class="bg-warning" style="min-height: 34px;"
                        ng-show="message.crtDistributor.error">
                        <p class="text-left">
                            [[message.error]]
                        </p>
                    </div>
                </div>
                <button
                    class="btn btn-danger col-md-3 no-radius" 
                    ng-click="deleteAlkes(dataOnModal.id)">
                    Delete
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credAlkesModal', 'edit', dataOnModal)">Edit</button>
            </div>
        </script>
    <script type="text/ng-template" id="credAlkesModal">
        <div class="row p-b-15">
            <h4 class="modal-title">[[titlecredAlkesModal]]</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="row p-b-15">
                        <div class="col-md-6">
                            <p class="text-left">Kode Alkes</p>
                        </div>
                        <div class="col-md-6">                                
                            <input 
                                type="text" 
                                class="form-control" 
                                name="code"
                                ng-model="temp.code">
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Nama Alkes</p>
                        </div>
                        <div class="col-md-6">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name"
                                ng-model="temp.name">
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Tipe Alkes</p>
                        </div>
                        <div class="col-md-6">
                            <input 
                                disabled="true" 
                                type="text" 
                                class="form-control" 
                                name="type"
                                ng-model="temp.type">
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Jenis Alkes</p>
                        </div>
                        <div class="col-md-6">
                            <select 
                                class="form-control m-b" 
                                name="sediaan"
                                ng-model="temp.jenis"
                                ng-options="d as d.key for d in defaultValues.jenisAlkes">
                            </select>
                        </div>
                    </div>
                    <div class="row p-b-15"" ng-show="temp.jenis.value==1">
                        <div class="col-md-6">
                            <p class="text-left">Tuslah</p>
                        </div>
                        <div class="overflow-table">
                            <table id="tuslah-table" class="table tuslah-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <button type="button"
                                                class="btn btn-primary btn-xs"
                                                ng-click="addTuslah()"
                                                ng-hide="temp.listTuslah.length == tuslah.length">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="l in temp.listTuslah">
                                        <td>
                                            <button type="button"
                                                class="btn btn-danger btn-xs"
                                                ng-click="removeTuslah($index)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </td>
                                        <td>[[$index + 1]]</td>
                                        <td>
                                            <select class="form-control condition"
                                                ng-model="l.tuslah_code"
                                                ng-change="setTuslah($index)"
                                                ng-options="s.id as s.name for s in tuslah">
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Explain</p>
                        </div>
                        <div class="col-md-6">
                            <textarea 
                                class="form-control" 
                                name="explain"
                                ng-model="temp.explain"></textarea>                            
                        </div>
                    </div>  
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Sediaan</p>
                        </div>
                        <div class="col-md-6">
                            <select 
                                class="form-control m-b" 
                                name="sediaan"
                                ng-model="temp.sediaan"
                                ng-options="d as d.key for d in defaultValues.sediaan">
                            </select>
                        </div>
                    </div>  
                    <!-- <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Price</p>
                        </div>
                        <div class="col-md-6">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="price"
                                ng-model="temp.price">
                        </div>
                    </div>   -->
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Category</p>
                        </div>
                        <div class="col-md-6">
                            <select 
                                class="form-control m-b" 
                                name="category"
                                ng-model="temp.category"
                                ng-options="d as d.name for d in listCategories">
                            </select>                            
                        </div>
                    </div>  
                </div>               
            </div>
        </div>
        <div class="row col-md-12 pull-right">
            <div class="col-md-9">
                <div class="bg-warning" style="min-height: 34px;"
                    ng-show="message.error">
                    <p class="text-left">
                        [[message.error]]
                    </p>
                </div>
            </div>
            <button 
                class="btn btn-info col-md-3 no-radius"
                ng-show="typecredAlkes=='tambah'"
                ng-click="createnewAlkes()">Tambah</button>
            <button 
                class="btn btn-info col-md-3 no-radius" 
                ng-show="typecredAlkes=='edit'"
                ng-click="updateAlkes()">Update</button>
        </div>
    </script>
@endsection
@section('scripts')
<script src="views/alkes/alkes.js"></script>
@endsection
