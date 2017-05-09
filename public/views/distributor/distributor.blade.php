@extends('layout.layout')
@section('title')
<title>Loket .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Loket </span>
</div>
@endsection
@section('nav')
    @include('layout.navFarmasi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Distributor</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="pendaftaranPasien-area" ng-controller="DistributorCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('credDistributorModal', 'tambah')"> Tambah Distributor</button>
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>Nomor Telephone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="distributor in tableListDistributor">
                            <td>[[$index + 1]]</td>
                            <td>[[distributor.name]]</td>
                            <td>[[distributor.address]]</td>
                            <td>[[distributor.phone]]</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('detailDistributorModal', '', distributor)">
                                        <i class="fa fa-id-card"></i>&nbsp;&nbsp;Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/ng-template" id="detailDistributorModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Detail Distributor</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-left">Nama Distributor</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.name]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Alamat</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.address]]</p>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Nomor Telephone</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">[[dataOnModal.phone]]</p>
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
                    ng-click="deleteDistributor(dataOnModal.id)">
                    Delete
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credDistributorModal', 'edit', dataOnModal)">Edit</button>
            </div>
        </script>
        <script type="text/ng-template" id="credDistributorModal">
            <div class="row p-b-15">
                <h4 class="modal-title">[[ titlecredDistributorModal]]</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-left">Nama Distributor</p>
                            </div>
                            <div class="col-md-6">                                
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="name"
                                    ng-model="temp.namadist">
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Alamat</p>
                            </div>
                            <div class="col-md-6">
                                <textarea 
                                    class="form-control" 
                                    name="address"
                                    ng-model="temp.alamatdist"></textarea>
                            </div>
                        </div>
                        <div class="row p-b-15"">
                            <div class="col-md-6">
                                <p class="text-left">Nomor Telephone</p>
                            </div>
                            <div class="col-md-6">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="phone"
                                    ng-model="temp.telpondist">
                            </div>
                        </div>     
                    </div>               
                </div>
            </div>
            <div class="row col-md-12 pull-right">
                <div class="col-md-9">
                    <div class="bg-warning" style="min-height: 34px;"
                        ng-show="message.crtDistributor.error">
                        <p class="text-left">
                            [[message.error]]
                        </p>
                    </div>
                </div>
                <button 
                    class="btn btn-info col-md-3 no-radius"
                    ng-show="typecredDistributor=='tambah'"
                    ng-click="createnewDistributor()">Tambah</button>
                <button 
                    class="btn btn-info col-md-3 no-radius" 
                    ng-show="typecredDistributor=='edit'"
                    ng-click="updateDistributor()">Update</button>
            </div>
        </script>
    </div>
@endsection
@section('scripts')
    <script src="views/distributor/distributor.js"></script>    
@endsection