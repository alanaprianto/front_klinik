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
                <h3>Transaksi Rawat Inap </h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')

    <div id="pendaftaranPasien-area" ng-controller="TransaksiRawatInapCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                        <div class="col-md-4 pull-right">
                            <form>
                                <div class="input-group">
                                    <input id="individualDrop"
                                        type="text" 
                                        class="form-control input-sm" 
                                        data-toggle="dropdown"
                                        placeholder="Cari Pasien" 
                                        ng-model="temp.searchParam">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default btn-sm" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                 </div>
                            </form>
                        </div>
            </div>
            <div class="col-md-12 no-padding">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Rekam Medis </th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Tanggal Masuk </th>
                                <th>Cara Bayar</th>
                                <th>Kelas </th>
                                <th>Kamar </th>
                                <th>Bed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="i in tablelistTransaksiRawatInap">
                                <td>[[$index + 1]]</td>
                                <td>[[i.number_medical_record]]</td>
                                <td>[[i.full_name]]</td>
                                <td>[[i.displayedGender]]</td>
                                <td>[[i.age]]</td>
                                <td>[[i.created_at]]</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <td>
                                <button class="btn btn-xs btn-success"
                                            ng-click="openModal('editPasienModal', '', i)">
                                            <i class="fa fa-edit"></i>
                                </button>
                                <button
                                    class="btn btn-xs btn-info"
                                    ng-click="openModal('detailTransaksiRawatInapModal', '', i)">
                                        <i class="fa fa-search-plus"></i>
                                </button>
                                <button
                                    class="btn btn-xs btn-warning"
                                    ng-click="openModal('transferTransaksiRawatInapModal', '', i)">
                                        <i class="fa fa-random"></i>
                                </button>
                                 <button
                                    class="btn btn-xs btn-danger"
                                    ng-click="openModal('detailDistributorModal', '', i)">
                                        <i class="fa fa-home"></i>
                                </button>
                                 <button
                                    class="btn btn-xs btn-primary"
                                    ng-click="openModal('detailDistributorModal', '', i)">
                                        <i class="fa fa-thermometer-quarter"></i>
                                </button>
                                <button
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('detailDistributorModal', '', i)">
                                        <i class="fa fa-hourglass-half"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/ng-template" id="editPasienModal">
            <div class="row p-b-15">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>No RM</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.number_reference]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nama Lengkap</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.register.patient.full_name]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>TTL / Umur</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedBirth]] / <b>[[dataOnModal.displayedAge]]</b> tahun</p>
                            </div>
                        </div>

                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Jenis Kelamin</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedGender]]</p>
                            </div>
                        </div>
                         <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Alamat</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.register.patient.address]]</p>
                            </div>
                        </div>
                         <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nomber Handpone</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.reference.register.patient.phone_number]]</p>
                            </div>
                        </div>

                        <div class="form-group field row text-left">
                            <hr>
                        </div>
                        
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Poli</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.displayedPoli]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Dokter</b>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control condition"
                                    ng-init="temp.doctor_id = dataOnModal.reference.staff_id"
                                    ng-model="temp.doctor_id"
                                    ng-options="l.pivot.staff_id as l.full_name for l in currentPoli.doctors">
                                </select>                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="row no-padding">
                                <div class="col-md-4">
                                    <button class="btn btn-info col-md-12 no-radius" 
                                        ng-click="openModal('medicalRecordModal', 'lg')">
                                        Medical Record
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-left">
                        <p><b>Layanan</b></p>
                        <div class="overflow-table">
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
                                                ng-change="setTotal($index)">
                                        </td>
                                        <td>[[temp.listServices[$index].service_total | currency]]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                        <p><b>Obat</b></p>
                        <div class="overflow-table">
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
                                        <th>Nama Obat</th>
                                        <th>Biaya Obat</th>
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
                                                ng-change="setTotal($index)">
                                        </td>
                                        <td>[[temp.listServices[$index].service_total | currency]]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <p><b>Kesimpulan Akhir</b></p>
                            <table class="table table-condition">
                                <tbody>
                                    <tr>
                                        <td class="no-border">
                                            <select name="final_result" class="form-control condition" 
                                                ng-model="temp.finalResult" required>
                                                <option ng-repeat="o in finalResultOnPoli"
                                                    value="[[o.value]]">[[o.key]]</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr ng-if="temp.finalResult == 3">
                                        <td class="no-border">
                                            <select name="poli" class="form-control condition" 
                                                ng-model="temp.poliID" required>
                                                <option ng-repeat="o in listPoli"
                                                    value="[[o.id]]">[[o.name]]</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no-border">Catatan :
                                            <textarea name="notes" class="form-control" ng-model="temp.notes"></textarea>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12 text-left">
                        <div class="col-md-9">
                            <div class="bg-warning" style="min-height: 34px;"
                                ng-show="message">
                                <p class="text-left">
                                    [[message]]
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" ng-click="createCheckUp()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>

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
       
    </div>
@endsection
@section('scripts')
    <script src="views/transaksiRawatInap/transaksiRawatInap.js"></script>    
@endsection
