@extends('layout.layout')
@section('title')
<title>Loket .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/dataPasien.png">
    <span>Loket </span>
</div>
@endsection
@section('nav')
    @include('layout.navLoket')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Antrian</h3>
            </ul>            
        </div>
    </nav>
@endsection
@section('content')
    <div id="staff-area" ng-controller="AntrianCtrl" >
        <div class="row no-margin no-padding">
            <div class="col-md-4">
                <h5>Antrian BPJS</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="a in antrianBpjs">
                            <td>[[a.displayedQueue]]</td>
                            <td>[[a.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-default btn-xs"
                                    ng-click="callQueue(a.type, a.queue_number, a.id)">
                                    <i class="fa fa-bullhorn"></i>
                                </button>
                                <span> | </span>
                                <button class="btn btn-warning btn-xs"
                                    ng-click="openModal('tambahPasienModal', 'lg', a)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h5>Antrian Umum</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="a in antrianUmum">
                             <td>[[a.displayedQueue]]</td>
                            <td>[[a.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-default btn-xs"
                                    ng-click="callQueue(a.type, a.queue_number, a.id)">
                                    <i class="fa fa-bullhorn"></i>
                                </button>
                                <span> | </span>
                                <button class="btn btn-warning btn-xs" 
                                    ng-click="openModal('tambahPasienModal', 'lg', a)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h5>Antrian Contractor</h5>
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="a in antrianContractor">
                            <td>[[a.displayedQueue]]</td>
                            <td>[[a.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-default btn-xs"
                                    ng-click="callQueue(a.type, a.queue_number, a.id)">
                                    <i class="fa fa-bullhorn"></i>
                                </button>
                                <span> | </span>
                                <button class="btn btn-warning btn-xs"
                                    ng-click="openModal('tambahPasienModal', 'lg', a)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="hide">
            <div id="printRegister">
                <div align="right" style="font-size:10px; text-align: center; border: 1px solid #000; width: 2cm; height: 2cm;">
                    <div style="top: 50%; transform: translateX(0%) translateY(50%);">
                      <b>
                          Nomor Antrian <br/>
                          <div style="font-size:20px;">
                            [[temp.poliquenumber]]
                          </div>
                      </b>
                    </div>
                </div> 
                <br>
                <div style="font-size:18px;"><b>Biodata Pasien</b></div>
                <table border="0"> 
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>[[temp.full_name]]</td>
                    </tr>                    
                    <tr>
                        <td>TTL</td>
                        <td>:</td>
                        <td>[[temp.place]]/[[temp.birth]]</td>
                    </tr>                    
                    <tr>
                        <td>Umur</td>
                        <td>:</td>
                        <td>[[temp.age]]</td>
                    </tr>                    
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>[[temp.gender.key]]</td>
                    </tr>                    
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>[[temp.address]]</td>
                    </tr>                    
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>[[temp.religion]]</td>
                    </tr>                    
                    <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td>[[temp.province.name]]</td>
                    </tr>
                    <tr>
                        <td>Kabupaten / Kota</td>
                        <td>:</td>
                        <td>[[temp.city.name]]</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>[[temp.district.name]]</td>
                    </tr>                
                    <tr>
                        <td>Kelurahan</td>
                        <td>:</td>
                        <td>[[temp.sub_district]]</td>
                    </tr>                    
                    <tr>
                        <td>Nama Dusun /RT/RW</td>
                        <td>:</td>
                        <td>[[temp.rt_rw]]</td>
                    </tr>                    
                    <tr>
                        <td>No Telp</td>
                        <td>:</td>
                        <td>[[temp.phone_number]]</td>
                    </tr>                    
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td>[[temp.last_education]]</td>
                    </tr>                    
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>[[temp.job]]</td>
                    </tr>                    
                    <tr>
                        <td>No Jamkesmas / Jamkesda / ASKES</td>
                        <td>:</td>
                        <td>[[temp.askes_number]]</td>
                    </tr>                    
                </table>        
                <br>
                <div style="font-size:18px;"><b>Register</b></div>
                <table border="0"> 
                    <tr>
                        <td>Nama Penanggung Jawab</td>
                        <td>:</td>
                        <td>[[temp.responsible_person]]</td>
                    </tr>                    
                    <tr>
                        <td>Status Penanggung Jawab</td>
                        <td>:</td>
                        <td>[[temp.responsible_person_state.key]]</td>
                    </tr>                    
                    <tr>
                        <td>Sebab Sakit</td>
                        <td>:</td>
                        <td>[[temp.cause_pain.key]]</td>
                    </tr>                    
                    <tr>
                        <td>Cara Kunjungan</td>
                        <td>:</td>
                        <td>[[temp.how_visit]]</td>
                    </tr>                    
                    <tr>
                        <td>Tipe Layanan</td>
                        <td>:</td>
                        <td>[[temp.service_type]]</td>
                    </tr>                    
                    <tr>
                        <td>Klinik</td>
                        <td>:</td>
                        <td>[[temp.poly.name]]</td>
                    </tr>                    
                    <tr>
                        <td>Nama Dokter</td>
                        <td>:</td>
                        <td>[[temp.doctor.full_name]]</td>
                    </tr>                                        
                </table>
            </div>
        </div>

        @include('layout.modalPendaftaranPasien')
    </div>
@endsection
@section('scripts')
    <script src="views/antrian/antrian.js"></script>
    <script src="views/layout/modalPendaftaranPasien.js"></script>
@endsection
