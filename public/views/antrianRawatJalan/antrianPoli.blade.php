@extends('layout.layout')
@section('title')
<title>Rawat Jalan .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
<link rel="stylesheet" href="views/antrianRawatJalan/antrianPoli.css">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Penata Jasa</span>
</div>
@endsection
@section('nav')
    @include('layout.navRawatJalan')
@endsection
@section('module-content-container')
    
@endsection
@section('content')
    <div id="antrian-area" ng-controller="AntrianCtrl">
        <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <ul>
                    <h3>[[poliType]]</h3>
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
                                    <td>[[a.Status]]</td>
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
                                            ng-click="openModal('editPasienModal', 'lg', a)">
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
                                    <td>[[a.displayedStatus]]</td>
                                    <td>
                                        <button class="btn btn-default btn-xs"
                                            ng-click="openModal('detailPasienModal', 'lg', a)">
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

        <div class="hide">
            <div id="printSuratSakit">
                <h2 align="center"><u>SURAT KETERANGAN SAKIT</u></h2>
                <p align="left">Yang bertanda tangan dibawah ini menerangkan bahwa:</p>
                <p align="justify">
                    Nama        : <b>[[dataOnModal.reference.register.patient.full_name]]</b> <br>
                    Alamat      : <b>[[dataOnModal.reference.register.patient.address]]</b><br>
                    Pekerjaan   : <b>[[dataOnModal.reference.register.patient.job]]</b><br>
                </p>
                <p align="justify">perlu istirahat karena sakit, selama <b>[[temp.duration]]</b> hari. Terhitung tanggal <b>[[temp.startDate|date:'dd-MM-yyyy']]</b> s/d <b>[[temp.endDate]]</b></p>
                <p align="left">Harap yang berkepentingan maklum.</p>
                <p align="right">
                    Bandung, [[todayDate]].<br>
                    Dokter<br>            
                    <hr>
                </p>
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
                                        ng-click="openModal('medicalRecordModal')">
                                        Medical Record
                                    </button>
                                </div>
                                <div class="col-md-5">
                                    <button class="btn btn-warning col-md-12 no-radius" 
                                        ng-click="openModal('medicalRecordOldModal')">
                                        Riwayat Medical Record
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-default col-md-12 no-radius" 
                                        ng-click="openModal('suratSakitModal')">
                                        Surat Sakit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-left">
                        <p><b>Tindakan</b></p>
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
                                        <th>Nama Tindakan</th>
                                        <th>Biaya Tindakan</th>
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
                                        <td>[[temp.listServices[$index].cost]]</td>
                                        <td class="col-sm-2">
                                            <input type="number"
                                                step="1" 
                                                min="0"
                                                class="form-control" 
                                                ng-model="l.service_amount"
                                                ng-change="setTotal($index)">
                                        </td>
                                        <td>[[temp.listServices[$index].service_total]]</td>
                                    </tr>
                                </tbody>
                            </table>.
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
                    Medical Record
                </h4>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Anamnesa</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control"
                                ng-model="temp.medrec.anamnesa">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Diagnosis</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="temp.medrec.diagnosis">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Explain</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="temp.medrec.explain">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Therapy</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text"                 
                                class="form-control" 
                                ng-model="temp.medrec.therapy">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Notes</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="temp.medrec.notes">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>ICD 10</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="temp.medrec.icd10">
                        </div>
                    </div>
                    
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-6">
                    <div class="bg-warning" style="min-height: 34px;"
                        ng-show="message">
                        <p class="text-left">
                            [[createMedicalRecorderror]]
                        </p>
                    </div>
                </div>
                <div class="col-md-6 pull-left">
                     <button type="submit" 
                         class="btn btn-default col-md-4 no-radius pull-right" 
                         ng-click="createMedicalRecord()">Submit</button>
                    
                </div>
            </div>
        </script>
        <script type="text/ng-template" id="medicalRecordOldModal">
            <div class="row p-b-15">
                <h4 class="modal-title">
                    Riwayat Medical Record
                </h4>
            </div>
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
                                    <th>ICD 10</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="l in dataOnModal.reference.medical_records">
                                    <td>[[$index + 1]]</td>
                                    <td>[[l.created_at]]</td>
                                    <td>[[l.anamnesa]]</td>
                                    <td>[[l.diagnosis]]</td>
                                    <td>[[l.explain]]</td>
                                    <td>[[l.therapy]]</td>
                                    <td>[[l.notes]]</td>
                                    <td>[[l.icd10]]</td>
                                </tr>
                            </tbody>
                        </table>
        </script>

        <script type="text/ng-template" id="suratSakitModal">
            <div class="row p-b-15">
                <h4 class="modal-title">
                    Surat Keterangan Sakit
                </h4>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Nama</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="dataOnModal.reference.register.patient.full_name">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Umur</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="dataOnModal.displayedAge">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                disabled="disabled" 
                                ng-model="dataOnModal.displayedGender">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Pekerjaan</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text"                 
                                class="form-control" 
                                ng-model="dataOnModal.reference.register.patient.job">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Alamat</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" 
                                class="form-control" 
                                ng-model="dataOnModal.reference.register.patient.address">
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Perlu Istirahat Selama</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="number"
                                step="1" 
                                min="0"
                                class="form-control" 
                                ng-model="temp.duration">
                        </div>
                        <div class="col-sm-6 no-padding">
                            <p style="margin-top: 5px">Hari</p>
                        </div>
                    </div>
                    <div class="form-group field row text-left">
                        <div class="col-sm-4 no-padding">
                            <label>Terhitung dari Tanggal</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" 
                                class="form-control" 
                                ng-model="temp.startDate">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-15 no-margin">
                <div class="col-md-12">
                    <button class="btn btn-default col-md-4 no-radius pull-right"
                        ng-click="printArea('printSuratSakit')">
                        <i class="fa fa-print"></i> Print
                    </button>
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
