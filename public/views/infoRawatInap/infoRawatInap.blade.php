@extends('layout.layout')
@section('title')
<title>Rawat Inap .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/rawat-inap.png">
    <span>Rawat Inap </span>
</div>
@endsection
@section('nav')
    @include('layout.navRawatInap')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Informasi Rawat Inap </h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')

    <div id="pendaftaranPasien-area" ng-controller="DistributorCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <p class="text-left"> Periode </p>
                <input type="date" name=""> Sampai Dengan <input type="date" name=""> 
                <p class="text-left"> Nama Pasien : </p>
                <input type="text" name="">
                <p class="text-left"> Nomber Rekam Medis : </p>
                <input type="text" name="">
                <p class="text-left"> Ruangan : </p>
                <input type="text" name="">
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Rekam Medis </th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk </th>
                                <th>Cara Bayar</th>
                                <th>Hak Kelas</th>
                                <th>Kelas </th>
                                <th>Kamar </th>
                                <th>Bed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="i in tablelistTransaksiRawatInap">
                                <td>[[$index + 1]]</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <td>
                                <button
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('detailTransaksiRawatInapModal', '', i)">
                                        <i class="fa fa-id-card"></i>&nbsp;&nbsp;Detail
                                </button>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script type="text/ng-template" id="detailTransaksiRawatInapModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Detail Pasien</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                    <img src="">
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-6">
                            <p class="text-left">Nomber Rekam Medis</p>
                            <p class="text-left">Nama Pasien </p>
                            <p class="text-left">Alamat </p>
                            <p class="text-left">Cara Bayar </p>
                            <p class="text-left">Kelas Ruangan</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[]]</p>
                            <p class="text-left">[[]] /[[]]</p>
                            <p class="text-left">[[]] </p>
                            <p class="text-left">[[ ]]</p>
                            <p class="text-left">[[]]</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h1 class="text-left">[[]]</h1>
                    </div>
                </div>
            </div>
            <div class="row p-b-15">
                <h4 class="modal-title"> Data Pembayaran </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal </th>
                                <th>Biaya</th>
                                <th>Jumlah</th>
                                <th>Total Tagihan </th>
                                <th>Dijamin </th>
                                <th>Subsidi </th>
                                <th>Lur Biaya</th>
                                <th>Harus Bayar </th>
                                <th>Staff </th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr ng-repeat="i in tablelistTransaksiRawatInap">
                                <td>[[$index + 1]]</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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
                <h4 class="modal-title">Transfer Pasien</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-left"> Tanggal Transfer </p>
                    <input type="date" name=""> 
                    <h4>Asal Pasien </h4>
                    <div class="col-md-6">
                        <p class="text-left">Nomber Rekam Medis </p>
                        <p class="text-left"> Nama Pasien  </p>
                        <p class="text-left"> Cara Bayar </p>
                        <p class="text-left"> Kelas Ruangan </p>
                        <p class="text-left"> Ruangan </p>
                        <p class="text-left"> Bed </p>
                    </div>
                    <div class="col-md-6">
                         <input type="text" name=""> 
                         <input type="text" name="">
                         <input type="text" name=""> 
                         <input type="text" name="">
                         <input type="text" name=""> 
                         <input type="text" name="">
                    </div>
                    <h4>Tujuan Pasien</h4>
                    <div class="col-md-6">
                        <p class="text-left"> Kelas Ruangan </p>
                        <p class="text-left"> Ruangan </p>
                        <p class="text-left"> Bed </p>
                    </div>
                    <div class="col-md-6">
                         <input type="text" name=""> 
                         <input type="text" name="">
                         <input type="text" name=""> 
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
                    ng-click="createnewDistributor()">Simpan </button>
                <button 
                    class="btn btn-info col-md-3 no-radius" 
                    ng-show="typecredDistributor=='edit'"
                    ng-click="updateDistributor()">cancel</button>
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
    <script src="views/transaksiRawatInap/transaksiRawatInap.js"></script>    
@endsection
