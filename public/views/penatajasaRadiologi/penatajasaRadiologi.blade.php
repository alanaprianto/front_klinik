@extends('layout.layout')
@section('title')
<title>Radiologi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
<link rel="stylesheet" href="views/antrianRawatJalan/antrianPoli.css">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Radiologi</span>
</div>
@endsection
@section('nav')
    @include('layout.navRadiologi')
@endsection
@section('module-content-container')
    
@endsection
@section('content')
    <div id="antrian-area" ng-controller="AntrianCtrl">
        <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <ul>
                    <h3>Radiologi</h3>
                </ul>
            </div>
        </nav>

        <div class="row no-margin no-padding">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#antrianHariIni" 
                        aria-controls="antrianHariIni" 
                        role="tab" data-toggle="tab">Antrian Hari Ini</a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riwayat</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="antrianHariIni">
                    <br>
                    <div class="col-md-12">
                        <table id="example" 
                            class="ui teal celled table compact display nowrap" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Antrian</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Dokter</th>
                                    <th>Status</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="a in antrianPoliUmum">
                                    <td>[[a.displayedQueue]]</td>
                                    <td>[[a.reference.register.patient.full_name]]</td>
                                    <td>[[a.displayedGender]]</td>
                                    <td>[[a.displayedDoctor]]</td>
                                    <td>[[a.displayedStatus]]</td>
                                    <td>
                                        <button class="btn btn-default btn-xs"
                                            ng-click="callQueue(
                                                a.type, 
                                                a.queue_number, 
                                                a.reference.register.patient.full_name, 
                                                a.id
                                            )">
                                            <i class="fa fa-bullhorn"></i>
                                        </button>
                                        <span> | </span>
                                        <button class="btn btn-warning btn-xs"
                                            ng-click="openModal('editPasienModal', 'lg', a, $index)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="profile">
                    <br>
                    <div class="col-md-12">
                        <table id="example" 
                            class="ui teal celled table compact display nowrap" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Rekam Medis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kesimpulan Akhir</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="a in getLoketAntrianPoliOld ">
                                    <td>[[$index + 1]]</td>
                                    <td>[[a.number_medical_record]]</td>
                                    <td>[[a.full_name]]</td>
                                    <td>[[a.displayedGender]]</td>
                                    <td>[[a.displayedFinalStatus]]</td>
                                    <td>
                                        <button class="btn btn-default btn-xs"
                                            ng-click="openModal('detailPasienModal', 'lg', a, $index)">
                                            <i class="fa fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-margin">
            
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

        

        <script type="text/ng-template" id="detailPasienModal">
            <!--<div class="row p-b-15">
                <h4 class="modal-title">
                    Pasien [[dataOnModal.reference.register.patient.full_name]]
                </h4>
            </div>-->
            <div class="row p-b-15">
                <div class="col-md-12">
                    <div class="col-md-4">
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
                    </div>

                    <div class="col-md-8 text-left">
                        <p><b>History</b></p>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default" ng-repeat="r in dataOnModal.registers | orderBy: 'created_at':true">
                                <div class="panel-heading" role="tab" id="r[[$index]]">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse[[$index]]" aria-expanded="true" aria-controls="collapse[[$index]]">
                                            [[formatDate(r.created_at) | date: 'dd MMM yyyy HH:mm']]
                                            <span class="pull-right"><small>[[r.displayedPaymentStatus]]</small></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse[[$index]]" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="r[[$index]]">
                                    <div class="panel-body">

                                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default" ng-repeat="rr in r.references">
                                                <div class="panel-heading" role="tab" id="rr[[$index]]">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapsed[[$parent.$index]]-[[$index]]" aria-expanded="true" aria-controls="collapsed[[$parent.$index]]-[[$index]]">
                                                            [[rr.poly.name]] / [[rr.doctor.full_name]]
                                                            <span class="pull-right"><small>[[rr.displayedStatus]]</small></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapsed[[$parent.$index]]-[[$index]]" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="rr[[$index]]">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                Nomor Pendaftaran
                                                            </div>
                                                            <div class="col-md-8">
                                                                [[rr.number_reference]]
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                Note
                                                            </div>
                                                            <div class="col-md-8">
                                                                [[rr.notes]]
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table service-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>NO</th> 
                                                                            <th>Tanggal</th> 
                                                                            <th>Anamnesa</th>
                                                                            <th>Diagnosis</th>
                                                                            <th>Explain</th>
                                                                            <th>Therapy</th>
                                                                            <th>Notes</th>
                                                                            <th>ICD10</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="ll in rr.medical_records">
                                                                            <td>[[$index + 1]]</td>
                                                                            <td>[[formatDate(ll.created_at) | date: 'dd MMM yyyy HH:mm']]</td>
                                                                            <td>[[ll.anamnesa]]</td>
                                                                            <td>[[ll.diagnosis]]</td>
                                                                            <td>[[ll.explain]]</td>
                                                                            <td>[[ll.therapy]]</td>
                                                                            <td>[[ll.notes]]</td>
                                                                            <td>[[ll.icd10]]</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>
    </div>
@endsection
@section('scripts')
<script src="views/antrianRawatJalan/antrianPoli.js"></script>
@endsection
