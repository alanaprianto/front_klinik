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
                            ng-model="temp.gender"
                            ng-options="d as d.key for d in defaultValues.gender">
                        </select>
                    </div>
                </div>
                 <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Agama</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="religion"
                            ng-model="temp.religion"
                            ng-options="d as d.key for d in defaultValues.religion">
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
                    <label class="col-sm-4 no-padding text-left">Provinsi / Kota</label>
                    <div class="col-sm-4">
                        <select 
                            class="form-control m-b" 
                            name="province" 
                            id="province"
                            ng-model="temp.province"
                            ng-options="province as province.name for province in provinces">
                            <option>--Pilih Provinsi--</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select 
                            class="form-control m-b" 
                            name="city" 
                            id="city"
                            ng-model="temp.city"
                            ng-options="city as city.name for city in cities | filter: { sub_code: temp.province.code }">
                            <option>--Pilih Kota--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Kecamatan</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="district" 
                            id="district"
                            ng-model="temp.district"
                            ng-change="getListSubDistricts()"
                            ng-options="district as district.name for district in districts | filter: { sub_code: temp.city.code }">
                            <option>--Pilih Kecamatan--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Kelurahan</label>
                    <div class="col-sm-8">
                        <select
                            type="text" 
                            class="form-control" 
                            name="subDistrict"
                            ng-model="temp.subDistrict"
                            ng-options="subDistrict as subDistrict.name for subDistrict in subDistricts | filter: { sub_code: temp.district.code }">
                            <option>--Pilih Kelurahan--</option>
                            </select>
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
                            ng-model="temp.last_education"
                            ng-options="d as d.key for d in defaultValues.education">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Pekerjaan</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="job"
                            ng-model="temp.job"
                            ng-options="d as d.key for d in defaultValues.listJobs">
                        </select>
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
                        <select 
                            class="form-control m-b" 
                            name="responsible_person_state"
                            ng-model="temp.responsible_person_state"
                            ng-options="d as d.key for d in defaultValues.statusInCharges">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Sebab Sakit</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="cause_pain"
                            ng-model="temp.cause_pain"
                            ng-options="d as d.gol_sb_sakit for d in defaultSSRjalanRl4b.data">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Cara Kunjungan</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="how_visit"
                            ng-model="temp.how_visit"
                            ng-options="d as d.key for d in defaultValues.visitType">
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Jam Kedatangan</label>
                    <div class="col-sm-8">
                        <input 
                            type="text" 
                            class="form-control time-1" 
                            name="time_attend"
                            ng-model="temp.time_attend"
                            ng-init="temp.time_attend = currHour">
                    </div>
                </div>-->
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Tipe Layanan</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="service_type"
                            ng-model="temp.service_type"
                            ng-options="d as d.key for d in defaultValues.serviceType">
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
                            ng-model="temp.poly"
                            ng-change="getDoctor($index)"
                            ng-options="d as d.name for d in listPoli">                        
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
                            ng-model="temp.doctor"
                            ng-options="d as d.full_name for d in listDoctor">                            
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
            ng-disabled="!temp.poly.id">Tambah</button>
    </div>
</script>

<script type="text/ng-template" id="tambahPasienLamaModal">
    <div class="row p-b-15">
        <h4 class="modal-title">Pasien Lama</h4>
    </div>
    <div class="row p-b-15">
        <br><br>
        <div class="col-md-3">
            
        </div>
        <div class="col-md-2">
            <p>Search</p>
        </div>
        <div class="col-md-4">
            <form style="padding-bottom: 10px; margin-top: -10px;">
                <div class="input-group">
                    <input id="individualDrop"
                        type="text" 
                        class="form-control input-sm" 
                        data-toggle="dropdown"
                        placeholder="Cari Pasien" 
                        ng-model="temp.searchParam">
                    <div class="input-group-btn">
                        <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                    <ul class="dropdown-menu col-md-12" role="menu" aria-labelledby="individualDrop">
                        <li role="presentation" ng-repeat="patient in patients | filter:{full_name: temp.searchParam}">
                            <a role="menuitem" ng-click="oldPatient(patient)">[[patient.full_name]]</a>
                        </li>
                    </ul>
                 </div>
            </form>
        </div>
        <div class="col-md-3">
            
        </div>
        <!-- <div class="col-md-6 text-left">
            <div class="form-group field p-b-15 row">
                <div class="col-md-4">
                    <p>Search</p>
                </div>
                <div class="col-md-8" >
                    <div class="input-group">
                        <input 
                            type="text" 
                            class="form-control"
                            name="searchPasien"
                            ng-model="temp.query" 
                            ng-keyup="searchPasien()">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" ng-click="searchPasien()">Search</button>
                        </span>
                    </div>
                    <p ng-show="temp.patients.length == 0">pencarian dengan kata kunci "[[temp.query]]" tidak ditemukan.</p>
                    <p ng-show="temp.patients.length > 0">[[temp.patients.length]] pasien ditemukan.</p>
                </div>
            </div>
            <div class="form-group field p-b-15 row" ng-show="temp.patients.length > 0">
                <div class="col-md-4">
                    <p>Pilih Pasien</p>
                </div>
                <div class="col-md-8">
                    <select 
                        class="form-control m-b" 
                        name="patient"
                        ng-init="temp.patient = temp.patients[0]"
                        ng-model="temp.patient"
                        ng-click="oldPatient()"
                        ng-options="p.result for p in temp.patients">
                    </select>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row p-t-15" ng-show="temp.patient">
        <div class="col-md-12">
            <div class="col-md-6">                
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
                            ng-model="temp.gender"
                            ng-options="d as d.key for d in defaultValues.gender">                            
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
                            ng-model="temp.religion"
                            ng-options="d as d.key for d in defaultValues.religion">
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
                            ng-model="temp.province"
                            ng-options="province as province.name for province in provinces">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select disabled="input" 
                            class="form-control m-b" 
                            name="city" 
                            id="city"
                            ng-model="temp.city"
                            ng-options="city as city.name for city in cities | filter: { sub_code: temp.province.code}">
                            <option>-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Kecamatan</label>
                    <div class="col-sm-8">
                        <select 
                            disabled="input"
                            class="form-control m-b" 
                            name="district" 
                            id="district"
                            ng-model="temp.district"
                            ng-options="district as district.name for district in districts | filter: { sub_code: temp.city.code }">
                            <option>--Pilih Kecamatan--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Kelurahan</label>
                    <div class="col-sm-8">
                        <select
                            disabled="input"
                            type="text" 
                            class="form-control" 
                            name="subDistrict"
                            ng-model="temp.subDistrict"
                            ng-options="subDistrict as subDistrict.name for subDistrict in subDistricts | filter: { sub_code: temp.district.code }">
                            <option>--Pilih Kelurahan--</option>
                        </select>
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
                            ng-model="temp.last_education"
                            ng-options="d as d.key for d in defaultValues.education">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Pekerjaan</label>
                    <div class="col-sm-8">
                        <select disabled="input" 
                            class="form-control m-b"
                            name="job"                            
                            ng-model="temp.job"
                            ng-options="d as d.key for d in defaultValues.listJobs">
                        </select>
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
                        <select 
                            class="form-control m-b" 
                            name="responsible_person_state"
                            ng-model="temp.responsible_person_state"
                            ng-options="d as d.key for d in defaultValues.statusInCharges">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Sebab Sakit</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="cause_pain"
                            ng-model="temp.cause_pain"
                            ng-options="d as d.gol_sb_sakit for d in defaultSSRjalanRl4b.data">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Cara Kunjungan</label>
                    <div class="col-sm-8">
                        <select class="form-control m-b" 
                            name="how_visit"
                            ng-model="temp.how_visit"
                            ng-options="d as d.key for d in defaultValues.visitType">
                        </select>
                    </div>
                </div>
                <!--<div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Jam Kedatangan</label>
                    <div class="col-sm-8">
                        <input 
                            type="text" 
                            class="form-control time-1" 
                            name="time_attend"
                            ng-model="temp.time_attend"
                            ng-init="temp.time_attend = currHour">
                    </div>
                </div>-->
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Tipe Layanan</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="service_type"
                            ng-model="temp.service_type"
                            ng-options="d as d.key for d in defaultValues.serviceType">
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Rujukan dari</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="poly" 
                            id="clinic"
                            ng-model="temp.poly"
                            ng-change="getDoctor($index)"
                            ng-options="d as d.name for d in listPoli">                        
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
                            ng-model="temp.doctor"
                            ng-options="d as d.full_name for d in listDoctor">                            
                        </select>
                    </div>
                </div>
                <div class="form-group field p-b-15 row">
                    <label class="col-sm-4 no-padding text-left">Pengecekan</label>
                    <div class="col-sm-8">
                        <select 
                            class="form-control m-b" 
                            name="doctor" 
                            id="doctors"
                            ng-model="temp.doctor"
                            ng-options="d as d.full_name for d in listDoctor">                            
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
            ng-click="createOldPendaftaranPasien()"
            ng-disabled="!temp.poly.id">Tambah</button>
    </div>
</script>