@extends('layout.layout')
@section('title')
<title>Master Data .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Master Data </span>
</div>
@endsection
@section('nav')
    @include('layout.navMasterData')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Tindakan </h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')

    <div id="pendaftaranPasien-area" ng-controller="ServiceCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('credServiceModal', 'tambah')"> Tambah  Tindakan </button>
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="u in tableListService">
                            <td>[[$index + 1]]</td>
                            <td>[[u.name]]</td>
                            <td>[[u.cost]]</td>
                            <td>[[u.desc]]</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('detailServiceModal', '', u)">
                                        <i class="fa fa-id-card"></i>&nbsp;&nbsp;Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/ng-template" id="detailServiceModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Detail Tindakan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-left">Nama Tindakan  </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.name]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Harga</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.cost]]</p>
                            </div>
                        </div>
                         <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Deskripsi </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.desc]]</p>
                            </div>
                        </div>  
                    </div>               
                </div>
            </div>
            <div class="row col-md-12 pull-right">
                <div class="col-md-6">
                    <div class="bg-warning" style="min-height: 34px;"
                        ng-show="message.crtService.error">
                        <p class="text-left">
                            [[message.error]]
                        </p>
                    </div>
                </div>
                <button
                    class="btn btn-danger col-md-3 no-radius" 
                    ng-click="deleteService(dataOnModal.id)">
                    Delete
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credService', 'edit', dataOnModal)">Edit</button>
            </div>
        </script>
        <script type="text/ng-template" id="credServiceModal">
            <div class="row p-b-15">
                <h4 class="modal-title">[[ titlecredServiceModal]]</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-left">Nama User</p>
                            </div>
                            <div class="col-md-6">                                
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="name"
                                    ng-model="temp.namedist">
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Harga</p>
                            </div>
                            <div class="col-md-6">
                                <textarea 
                                    class="form-control" 
                                    name="address"
                                    ng-model="temp.costdist"></textarea>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Deskripsi</p>
                            </div>
                            <div class="col-md-6">
                                <textarea 
                                    class="form-control" 
                                    name="address"
                                    ng-model="temp.descdist"></textarea>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
            <div class="row col-md-12 pull-right">
                <div class="col-md-9">
                    <div class="bg-warning" style="min-height: 34px;"
                        ng-show="message.crtUser.error">
                        <p class="text-left">
                            [[message.error]]
                        </p>
                    </div>
                </div>
                <button 
                    class="btn btn-info col-md-3 no-radius"
                    ng-show="typecredService=='tambah'"
                    ng-click="createnewService()">Tambah</button>
                <button 
                    class="btn btn-info col-md-3 no-radius" 
                    ng-show="typecredService=='edit'"
                    ng-click="updateService()">Update</button>
            </div>
        </script>
    </div>
@endsection
@section('scripts')
    <script src="views/service/service.js"></script>    
@endsection
