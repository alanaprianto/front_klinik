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
                                <button 
                                    type="button"
                                    class="btn btn-xs btn-info btn-icon"
                                    value="Detail"
                                    title="Detail"
                                    ng-click="openModal('detailTransaksiRawatInapModal', '', i)">
                                    <i class="fa fa-search-plus"></i>
                                </button>
                                <button 
                                    type="button"
                                    class="btn btn-xs btn-default btn-icon"
                                    value="Pemeriksaan"
                                    title="Pemeriksaan"
                                    ng-click="openModal('editPasienModal', 'lg', i)">
                                    <i class="fa fa-stethoscope"></i>
                                </button>
                                <button 
                                    type="button"
                                    class="btn btn-xs btn-warning btn-icon"
                                    value="Transfer"
                                    title="Transfer"
                                    ng-click="openModal('transferTransaksiRawatInapModal', '', i)">
                                    <i class="fa fa-random"></i>
                                </button>
                                <button 
                                    type="button"
                                    class="btn btn-xs btn-primary btn-icon"
                                    value="Dirujuk Ke Laboratorium"
                                    title="Dirujuk Ke Laboratorium"
                                    ng-click="openRujukLab(i.id)">
                                    <i class="fa fa-thermometer-quarter"></i>
                                </button>
                                <button 
                                    type="button"
                                    class="btn btn-xs btn-success btn-icon"
                                    value="Dirujuk Ke Radiologi"
                                    title="Dirujuk Ke Radiologi"
                                    ng-click="openRujukRad(i.id)">
                                    <i class="fa fa-hourglass-half"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-default btn-icon"
                                    value="Dirujuk Ke Operasi"
                                    title="Dirujuk Ke Operasi"
                                    ng-click="openRujukOpr(i.id)">
                                    <i class="fa fa-user-md"></i>
                                </button>
                                <button 
                                    type="button"
                                    class="btn btn-xs btn-danger btn-icon"
                                    value="Dipulangkan"
                                    title="Dipulangkan"
                                    ng-click="openDipulangkan(i.id)">
                                    <i class="fa fa-home"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/ng-template" id="medicalRecordModal">
            <div class="row p-b-15">
                <h4 class="modal-title">
                    Riwayat Medical Record
                </h4>
            </div>
            <div ng-hide="temp.medrec.showEdit">
                <table class="table service-table">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th> 
                            <th class="text-center">Tanggal</th> 
                            <th class="text-left">Anamnesa</th>
                            <th class="text-left">Diagnosis</th>
                            <th class="text-left">Explain</th>
                            <th class="text-left">Therapy</th>
                            <th class="text-left">Notes</th>
                            <th class="text-left">ICD 10</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="l in dataOnModal.reference.medical_records">
                            <td>[[$index + 1]]</td>
                            <td>[[l.created_at]]</td>
                            <td class="text-left">[[l.anamnesa]]</td>
                            <td class="text-left">[[l.diagnosis]]</td>
                            <td class="text-left">[[l.explain]]</td>
                            <td class="text-left">[[l.therapy]]</td>
                            <td class="text-left">[[l.notes]]</td>
                            <td class="text-left">
                                <p ng-repeat="ll in l.listICD10">[[ll]]</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7"></td>
                            <td>
                                <button class="btn btn-sm btn-primary text-left" ng-click="temp.medrec.showEdit = true">Tambah</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row p-b-15 no-margin" ng-show="temp.medrec.showEdit">
                <div class="col-md-12">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>ICD 10</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="dropdown pull-right col-md-12 no-padding" auto-close="outsideClick">
                                <div class="col-md-10 no-padding">
                                    <p ng-repeat="i in temp.medrec.icd10">
                                        <button class="btn btn-xs btn-danger" ng-click="removeICDItem($index)">X</button>
                                        [[i.code]] - [[i.desc]]
                                    </p>
                                </div>
                                <button id="individualDrop"
                                    type="button" 
                                    data-toggle="dropdown"
                                    class="btn btn-default dropdown-toggle col-md-2 text-left">
                                    <span class="pull-left">search</span><span class="pull-right"> <i class="fa fa-search"></i></span>
                                </button>
                                <ul class="dropdown-menu col-md-12" role="menu" aria-labelledby="individualDrop">
                                    <input disable-auto-close 
                                        type="search"
                                        class="form-control" 
                                        placeholder="Search"
                                        ng-model="temp.medrec.query"
                                        ng-keyup="getICD()">
                                    <li role="presentation" ng-repeat="icd in icd10">
                                        <a role="menuitem" ng-click="getICDItem(icd)" ng-hide="icd.selected">[[icd.code]] - [[icd.desc]]</a>
                                    </li>  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Anamnesa</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="notes" class="form-control" ng-model="temp.medrec.anamnesa"></textarea>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Diagnosis</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="notes" class="form-control" ng-model="temp.medrec.diagnosis"></textarea>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Explain</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="notes" class="form-control" ng-model="temp.medrec.explain"></textarea>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Therapy</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="notes" class="form-control" ng-model="temp.medrec.therapy"></textarea>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Notes</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="notes" class="form-control" ng-model="temp.medrec.notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-warning" style="min-height: 34px;"
                        ng-show="createMedicalRecorderror">
                        <p class="text-left">
                            [[createMedicalRecorderror]]
                        </p>
                    </div>
                </div>
                <div class="col-md-6 pull-left">
                    <button type="submit" 
                         class="btn btn-default col-md-4 no-radius pull-right" 
                         ng-click="createMedicalRecord()">Submit</button>
                    <button class="btn btn-warning col-md-4 no-radius pull-right" ng-click="temp.medrec.showEdit = false">Batal</button>
                </div>
            </div>
        </script>

        <script type="text/ng-template" id="editPasienModal">
            <div class="row p-b-15">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>No RM</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.number_medical_record]]</p>
                            </div>
                        </div>
                        <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nama Lengkap</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.full_name]]</p>
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
                                <p>[[dataOnModal.address]]</p>
                            </div>
                        </div>
                         <div class="form-group field row text-left">
                            <div class="col-sm-4 no-padding">
                                <b>Nomber Handpone</b>
                            </div>
                            <div class="col-sm-8">
                                <p>[[dataOnModal.phone_number]]</p>
                            </div>
                        </div>

                        <div class="form-group field row text-left">
                            <hr>
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
                    <img src="">
                    
                        <div class="col-md-6">
                            <p class="text-left">Nomber Rekam Medis</p>
                            <p class="text-left">Nama Pasien </p>
                            <p class="text-left">gender </p>
                            <p class="text-left">Alamat </p>
                            <p class="text-left">Cara Bayar </p>
                            <p class="text-left">Kelas Ruangan</p>
                        </div>
                        <div class="col-md-6" ng-repeat="i in tablelistTransaksiRawatInap">
                            <p class="text-left">[[i.number_medical_record]]</p>
                            <p class="text-left">[[i.full_name]]</p>
                            <p class="text-left">[[i.displayedGender]] </p>
                            <p class="text-left">[[i.address]]</p>
                            <p class="text-left">[[i.gender]]</p>
                            <p class="text-left">[[]]</p>
                        </div>                    
                        <h1 class="text-left">[[]]</h1>
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
                    ng-click="openModal('credDistributorModal', 'edit', dataOnModal)">Edit
                </button>
            </div>
        </script>
    
        <script type="text/ng-template" id="transferTransaksiRawatInapModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Asal Pasien</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="">
                    
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Nomber Rekam Medis</p>
                        </div>
                        <div class="col-sm-8 no-padding">
                        <p class="text-left">[[dataOnModal.number_medical_record]]</p>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Nama Pasien </p>
                        </div>
                        <div class="col-sm-8 no-padding">
                            <p class="text-left">[[dataOnModal.full_name]]</p>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Gender </p>
                        </div>
                        <div class="col-sm-8 no-padding">
                            <p class="text-left">[[dataOnModal.displayedGender]] </p>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Kelas </p>
                        </div>
                        <div class="col-sm-8 no-padding">
                            <p class="text-left">[[dataOnModal.displayedGender]]</p>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Kamar </p>
                        </div>
                        <div class="col-sm-8 no-padding">
                            <p class="text-left">[[dataOnModal.displayedGender]]</p>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Bad </p>
                        </div>
                        <div class="col-sm-8 no-padding">
                            <p class="text-left">[[dataOnModal.displayedGender]]</p>
                        </div>
                                        
                        <h1 class="text-left">[[]]</h1>
                </div>
            </div>
            <div class="row p-b-15">
                <h4 class="modal-title">Tujuan Kamar</h4>
            </div>
            <div class="row">
                <div class="col-md-12">                    
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Kelas </p>
                        </div>
                        <div class="col-sm-8 ">
                            <select 
                            class="form-control m-b" 
                            name="service_type"
                            ng-model="temp.service_type"
                            ng-options="d as d.display_name for d in class_rooms">
                            </select>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Kamar </p>
                        </div>
                        <div class="col-sm-8 ">
                            <select 
                            class="form-control m-b" 
                            name="service_type"
                            ng-model="temp.service_type"
                            ng-options="d as d.display_name for d in rooms">
                            </select>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <p class="text-left">Bad </p>
                        </div>
                        <div class="col-sm-8 ">
                            <select 
                            class="form-control m-b" 
                            name="service_type"
                            ng-model="temp.service_type"
                            ng-options="d as d.display_name for d in beds">
                            </select>
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
                    ng-click="openModal('credDistributorModal', 'edit', dataOnModal)">Edit
                </button>
            </div>
        </script> 
        <!-- <script type="text/ng-template" id="dipulangkanModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Anda Yakin</h4>
                <p> Apakah Pasien Yakin di pulangkan ?</p>
            </div>       
                       
            <div class="row col-md-12">
                
                <button
                    class="btn btn-danger col-md-3 no-radius" 
                    ng-click="deleteDistributor(dataOnModal.id)">
                    ya
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credDistributorModal',  dataOnModal)">
                    Tidak
                </button>
            </div>
        </script>  -->
        <!-- <script type="text/ng-template" id="operasiModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Anda Yakin</h4>
                <p> Apakah Pasien Yakin di Rujuk Operasi ?</p>
            </div>       
                       
            <div class="row col-md-12">
                
                <button
                    class="btn btn-danger col-md-3 no-radius" 
                    ng-click="deleteDistributor(dataOnModal.id)">
                    ya
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credDistributorModal',  dataOnModal)">
                    Tidak
                </button>
            </div>
        </script>  -->   
        <!-- <script type="text/ng-template" id="labModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Anda Yakin</h4>
                <p> Apakah Pasien Yakin di Rujuk Laboratorium ?</p>
            </div>       
                       
            <div class="row col-md-12">
                
                <button
                    class="btn btn-danger col-md-3 no-radius" 
                    ng-click="deleteDistributor(dataOnModal.id)">
                    ya
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credDistributorModal',  dataOnModal)">
                    Tidak
                </button>
            </div>
        </script>  -->
        <!-- <script type="text/ng-template" id="radiologiModal">
            <div class="row p-b-15">
                <h4 class="modal-title">Anda Yakin</h4>
                <p> Apakah Pasien Yakin di Rujuk Radiologi ?</p>
            </div>       
                       
            <div class="row col-md-12">
                
                <button
                    class="btn btn-danger col-md-3 no-radius" 
                    ng-click="deleteDistributor(dataOnModal.id)">
                    ya
                </button>
                <button 
                    class="btn btn-warning col-md-3 no-radius" 
                    ng-click="openModal('credDistributorModal',  dataOnModal)">
                    Tidak
                </button>
            </div>
        </script>     --> 
    </div>
@endsection
@section('scripts')
    <script src="views/transaksiRawatInap/transaksiRawatInap.js"></script>    
@endsection
