@extends('layout.layout')
@section('title')
<title>Rawat Inap .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png" />
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars">
        <i class="ti-menu"></i>
    </div>
    <img src="assets/images/logo/dataPasien.png">
    <span>Rawat Inap</span>
</div>
@endsection
@section('nav')
    @include('layout.navRawatInap')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Pendaftaran Rawat Inap</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
   <div id="pendaftaranPasien-area" ng-controller="RegisterIRNACtrl" >
        <div class="row no-margin no-padding"">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#antrianHariIni" 
                       aria-controls="antrianHariIni" 
                        role="tab" data-toggle="tab">Hari Ini</a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riwayat</a>
                </li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="antrianHariIni">
                    <br>
                    <div class="col-md-12 m-b-15">
                        <button 
                            class="btn btn-info col-md-4 no-radius" 
                            ng-click="openModal('tambahPasienBaruModal', 'lg')"> Pendaftaran Pasien Baru</button>
                        <div class="col-md-4 pull-right">
                            
                        </div>
                    </div>
                    <div class="col-md-12 m-b-15">
                        <div class="row">
                            <div class="col-md-6">
                                List Pasien yang Terdaftar
                            </div>
                            <div class="col-md-6">
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
                    </div>
                    <div class="col-md-12">
                        <table class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Rekam Medis</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Terakhir Kunjungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="patient in tableListPatients | filter: { full_name: temp.searchParam }">
                                    <td>[[$index + 1]]</td>
                                    <td>[[patient.number_medical_record]]</td>
                                    <td>[[patient.full_name]]</td>
                                    <td>[[patient.displayedGender]]</td>
                                    <td>[[patient.age]]</td>
                                    <td>[[patient.address]]</td>
                                    <td>[[patient.phone_number]]</td>
                                    <td>[[patient.formatDate(visitor.registers[0].created_at) | date: 'dd MMM yyyy HH:mm']]</td>
                                    <td>
                                        <button class="btn btn-xs btn-success"
                                            ng-click="openModal('tambahPasienLamaModal', 'lg', patient)">
                                            Daftarkan Pasien
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
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Rekam Medis</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Telepon</th>
                                    <th>Terakhir Kunjungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="visitor in tableListPatients | filter: { patient: searchVisitor }">
                                    <td>[[$index + 1]]</td>
                                    <td>[[visitor.number_medical_record]]</td>
                                    <td>[[visitor.full_name]]</td>
                                    <td>[[visitor.displayedGender]]</td>
                                    <td>[[visitor.age]]</td>
                                    <td>[[visitor.phone_number]]</td>
                                    <td>[[formatDate(visitor.registers[0].created_at) | date: 'dd MMM yyyy HH:mm']]</td>
                                    <td>
                                        <button class="btn btn-xs btn-success"
                                            ng-click="openModal('detailPasienLamaModal', 'lg', visitor)">
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

        <script type="text/ng-template" id="detailPasienLamaModal">
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
                                <p>[[dataOnModal.birth]] / <b>[[dataOnModal.age]]</b> tahun</p>
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

        @include('layout.modalPendaftaranIrna')
        
    </div>
@endsection
@section('scripts')
<script src="views/rawat_inap/register_irna.js"></script>
<script src="views/layout/modalPendaftaranIrna.js"></script>
@endsection
