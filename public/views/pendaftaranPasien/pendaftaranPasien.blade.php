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
                <h3>Pendaftaran Pasien</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="pendaftaranPasien-area" ng-controller="PendaftaranPasienCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('tambahPasienModal')"> Tambah Pasien</button>
            </div>
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Umur</th>
                            <th>Status Pendaftaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="register in tableListRegister">
                            <td>[[$index + 1]]</td>
                            <td>[[register.register_number]]</td>
                            <td>[[register.patient.number_medical_record]]</td>
                            <td>[[register.patient.full_name]]</td>
                            <td>[[register.patient.age]]</td>
                            <td>[[register.displayedStatus]]</td>
                            <td>
                                <button class="btn btn-xs btn-default"
                                    ng-click="openModal('tambahRujukanModal', '', register)">
                                    <i class="fa fa-plus"></i> rujukan
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/ng-template" id="tambahRujukanModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Tambah Rujukan</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="row p-b-15">
                        <div class="col-md-4">
                            <p class="text-left">Nomor Pendaftaran</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.register_number]]</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Nama</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row p-b-15" ng-repeat="ref in dataOnModal.references">
                        <div class="col-md-12">
                            <p class="text-left"><b>Kunjungan [[$index + 1]]</b></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left">Dokter</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[ref.doctor.full_name]]</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left">Poli</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[ref.poly.name]]</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left">Status</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[ref.displayedStatus]]</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Klinik</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="poly" 
                                id="clinic"
                                ng-model="temp.poly_id"
                                ng-change="getDoctor($index)">
                                <option ng-repeat="poli in listPoli" value="[[poli.id]]">[[poli.name]]</option>
                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Dokter</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="doctor" 
                                id="doctors"
                                ng-model="temp.doctor_id">
                                <option ng-repeat="doctor in listDoctor" value="[[doctor.id]]">
                                    [[doctor.full_name]]
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-t-15">
            <div class="col-md-9">
            </div>
            <button 
                class="btn btn-info col-md-3 no-radius" 
                ng-click="createTambahRujukan()"
                ng-disabled="!temp.poly_id">Tambah</button>
        </div>
    </script>

    <script type="text/ng-template" id="tambahPasienModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Pilih Tipe Pendaftaran</h4>
        </div>
        <div class="row">
            <div class="col-md-5">
                <button 
                    class="btn btn-info col-md-12 no-radius"
                    ng-click="openModal('tambahPasienBaruModal', 'lg')">Pasien Baru</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <button 
                    class="btn btn-info col-md-12 no-radius" 
                    ng-click="openModal('tambahPasienLamaModal', 'lg')">Pasien Lama</button>
            </div>
        </div>
    </script>

    <script type="text/ng-template" id="tambahPasienBaruModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Pasien Baru</h4>
        </div>
        <div class="row p-t-15">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">No RM</label>
                        <div class="col-sm-8">
                            <input 
                                id="number_medical_record"
                                type="text" 
                                class="form-control"
                                name="number_medical_record"
                                ng-model="temp.number_medical_record">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="full_name"
                                ng-model="temp.full_name">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">TTL</label>
                        <div class="col-sm-3">
                            <input 
                                type="text" 
                                class="form-control" 
                                placeholder="Tempat" 
                                name="place"
                                ng-model="temp.place">
                            </div>
                        <div class="col-sm-5">
                            <input 
                                type="date" 
                                class="form-control date-1" 
                                name="birth"
                                ng-model="temp.birth"
                                ng-change="getAge()">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Umur</label>
                        <div class="col-sm-8">
                            <p>[[temp.age]] tahun</p>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="gender"
                                ng-model="temp.gender">
                                <option value="1">laki - laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Alamat</label>
                        <div class="col-sm-8">
                            <textarea 
                                class="form-control" 
                                name="address"
                                ng-model="temp.address"></textarea>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Agama</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="religion"
                                ng-model="temp.religion">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Budha</option>
                                    <option>Hindu</option>
                                    <option>Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Provinsi / Kota</label>
                        <div class="col-sm-4">
                            <select 
                                class="form-control m-b" 
                                name="province" 
                                id="province"
                                ng-model="temp.province">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select 
                                class="form-control m-b" 
                                name="city" 
                                id="city"
                                ng-model="temp.city">
                                <option>-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Kecamatan</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="district" 
                                ng-model="temp.district">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Kelurahan</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="sub_district"
                                ng-model="temp.sub_district">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Dusun /RT/RW</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="rt_rw"
                                ng-model="temp.rt_rw">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">No Telp</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="phone_number"
                                ng-model="temp.phone_number">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Pendidikan</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="last_education"
                                ng-model="temp.last_education">
                               <option>SD</option>
                               <option>SMP</option>
                               <option>SMA</option>
                               <option>Diploma 1</option>
                               <option>Diploma 2</option>
                               <option>Diploma 3</option>
                               <option>S1</option>
                               <option>S2</option>
                               <option>S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Pekerjaan</label>
                        <div class="col-sm-8">
                            <input
                                class="form-control m-b" 
                                name="job"
                                ng-model="temp.job">
                                
                            </input>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">No Jamkesmas / Jamkesda / ASKES
                        </label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="askes_number"
                                ng-model="temp.askes_number">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Penanggung Jawab</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="responsible_person"
                                ng-model="temp.responsible_person">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Status Penanggung Jawab</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="responsible_person_state"
                                ng-model="temp.responsible_person_state">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Sebab Sakit</label>
                        <div class="col-sm-8">
                            <textarea 
                                class="form-control" 
                                name="cause_pain"
                                ng-model="temp.cause_pain"></textarea>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Cara Kunjungan</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="how_visit"
                                ng-model="temp.how_visit">
                                <option>Di Antar</option>
                                <option>Datang Sendiri</option>
                                <option>Di Jemput</option>
                            </select>
                        </div>
                    </div>
                   <!--  <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Jam Kedatangan</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control time-1" 
                                name="time_attend"
                                ng-model="temp.time_attend">
                        </div>
                    </div> -->
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Tipe Layanan</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="service_type"
                                ng-model="temp.service_type">
                                    <option>Reguler</option>
                                    <option>Prioritas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Klinik</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="poly" 
                                id="clinic"
                                ng-model="temp.poly_id"
                                ng-change="getDoctor($index)">
                                <option ng-repeat="poli in listPoli" value="[[poli.id]]">[[poli.name]]</option>
                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Dokter</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="doctor" 
                                id="doctors"
                                ng-model="temp.doctor_id">
                                <option ng-repeat="doctor in listDoctor" value="[[doctor.id]]">
                                    [[doctor.full_name]]
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-t-15">
            <div class="col-md-9">
                <div class="bg-warning" style="min-height: 34px;"
                    ng-show="message.createLoketRegisters.error">
                    <p class="text-left">
                        [[message.createLoketRegisters.error]]
                    </p>
                </div>
            </div>
            <button 
                class="btn btn-info col-md-3 no-radius" 
                ng-click="createNewPendaftaranPasien()"
                ng-disabled="!temp.poly_id">Tambah</button>
        </div>
    </script>

    <script type="text/ng-template" id="tambahPasienLamaModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Pasien Lama</h4>
        </div>
        <div class="row p-b-15">
            <div class="col-md-12">
                <input 
                    type="text" 
                    class="form-control"
                    name="searchPasien"
                    ng-model="query" 
                    ng-keyup="$event.keyCode == 13 && seachPasien()">
            </div>
        </div>
        <div class="row p-t-15">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">No RM</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                id="number_medical_record"
                                type="text" 
                                class="form-control"
                                name="number_medical_record"
                                ng-model="temp.number_medical_record">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                type="text" 
                                class="form-control" 
                                name="full_name"
                                ng-model="temp.full_name">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">TTL</label>
                        <div class="col-sm-3">
                            <input disabled="input" 
                                type="text" 
                                class="form-control" 
                                placeholder="Tempat" 
                                name="place"
                                ng-model="temp.place">
                            </div>
                        <div class="col-sm-5">
                            <input disabled="input" 
                                type="date" 
                                class="form-control date-1" 
                                name="birth"
                                ng-model="temp.birth"
                                ng-change="getAge()">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Umur</label>
                        <div class="col-sm-8">
                            <p>[[temp.age]] tahun</p>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select disabled="input" 
                                class="form-control m-b" 
                                name="gender"
                                ng-model="temp.gender">
                                <option value="1">laki - laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Alamat</label>
                        <div class="col-sm-8">
                            <textarea disabled="input" 
                                class="form-control" 
                                name="address"
                                ng-model="temp.address"></textarea>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Agama</label>
                        <div class="col-sm-8">
                            <select disabled="input" 
                                class="form-control m-b" 
                                name="religion"
                                ng-model="temp.religion">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Budha</option>
                                    <option>Hindu</option>
                                    <option>Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Provinsi / Kota</label>
                        <div class="col-sm-4">
                            <select disabled="input" 
                                class="form-control m-b" 
                                name="province" 
                                id="province"
                                ng-model="temp.province">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select disabled="input" 
                                class="form-control m-b" 
                                name="city" 
                                id="city"
                                ng-model="temp.city">
                                <option>-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Kecamatan</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                type="text" 
                                class="form-control" 
                                name="district" 
                                ng-model="temp.district">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Kelurahan</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                type="text" 
                                class="form-control" 
                                name="sub_district"
                                ng-model="temp.sub_district">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Dusun /RT/RW</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                type="text" 
                                class="form-control" 
                                name="rt_rw"
                                ng-model="temp.rt_rw">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">No Telp</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                type="text" 
                                class="form-control" 
                                name="phone_number"
                                ng-model="temp.phone_number">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Pendidikan</label>
                        <div class="col-sm-8">
                            <select disabled="input" 
                                class="form-control m-b" 
                                name="last_education"
                                ng-model="temp.last_education">
                               <option>SD</option>
                               <option>SMP</option>
                               <option>SMA</option>
                               <option>Diploma 1</option>
                               <option>Diploma 2</option>
                               <option>Diploma 3</option>
                               <option>S1</option>
                               <option>S2</option>
                               <option>S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Pekerjaan</label>
                        <div class="col-sm-8">
                            <input disabled="input" 
                                class="form-control m-b" 
                                name="job"
                                ng-model="temp.job">
                                
                            </input>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">No Jamkesmas / Jamkesda / ASKES
                        </label>
                        <div class="col-sm-8">
                            <input  disabled="input" 
                                type="text" 
                                class="form-control" 
                                name="askes_number"
                                ng-model="temp.askes_number">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Penanggung Jawab</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="responsible_person"
                                ng-model="temp.responsible_person">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Status Penanggung Jawab</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="responsible_person_state"
                                ng-model="temp.responsible_person_state">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Sebab Sakit</label>
                        <div class="col-sm-8">
                            <textarea 
                                class="form-control" 
                                name="cause_pain"
                                ng-model="temp.cause_pain"></textarea>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Cara Kunjungan</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="how_visit"
                                ng-model="temp.how_visit">
                                <option>Di Antar</option>
                                <option>Datang Sendiri</option>
                                <option>Di Jemput</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Jam Kedatangan</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control time-1" 
                                name="time_attend"
                                ng-model="temp.time_attend">
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Tipe Layanan</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="service_type"
                                ng-model="temp.service_type">
                                    <option>Reguler</option>
                                    <option>Prioritas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Klinik</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="poly" 
                                id="clinic"
                                ng-model="temp.poly_id"
                                ng-change="getDoctor($index)">
                                <option ng-repeat="poli in listPoli" value="[[poli.id]]">[[poli.name]]</option>
                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nama Dokter</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="doctor" 
                                id="doctors"
                                ng-model="temp.doctor_id">
                                <option ng-repeat="doctor in listDoctor" value="[[doctor.id]]">
                                    [[doctor.full_name]]
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-t-15">
            <div class="col-md-9">
                <div class="bg-warning" style="min-height: 34px;"
                    ng-show="message.createLoketRegisters.error">
                    <p class="text-left">
                        [[message.createLoketRegisters.error]]
                    </p>
                </div>
            </div>
            <button 
                class="btn btn-info col-md-3 no-radius" 
                ng-click="createNewPendaftaranPasien()"
                ng-disabled="!temp.poly_id">Tambah</button>
        </div>
    </script>
@endsection
@section('scripts')
    <script src="views/pendaftaranPasien/pendaftaranPasien.js"></script>
@endsection