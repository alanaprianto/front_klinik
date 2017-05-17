@extends('layout.layout')
@section('title')
<title>Masterdata .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/master-data.png">
    <span>Master Data </span>
</div>
@endsection
@section('nav')
    @include('layout.navMasterData')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>DATABASE STAFF</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="staff-area" ng-controller="StaffCtrl" >
        <div class="row no-margin">
            <div class="col-md-12 no-padding m-b-15">
                 <button 
                    class="btn btn-info col-md-4 no-radius" 
                    ng-click="openModal('credStaffModal', 'tambah')"> Tambah Staff </button>
            </div>
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Staff Position</th>
                            <th>Staff Job</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="staff in tableListStaff">
                            <td>[[$index + 1]]</td>
                            <td>[[staff.nik]]</td>
                            <td>[[staff.full_name]]</td>
                            <td>[[staff.displayedGender]]</td>
                            <td>[[staff.staff_position.name]]</td>
                            <td>[[staff.staff_job.name]]</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-default"
                                    ng-click="openModal('detailStaffJobModal', '', staff)">
                                        <i class="fa fa-id-card"> </i> Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/ng-template" id="detailStaffJobModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Detail Staff </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-left">Nama </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.full_name]]</p>
                        </div>
                    </div>
                    <div class="row p-b-15"">
                        <div class="col-md-6">
                            <p class="text-left">Deskripsi</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">[[dataOnModal.desc]]</p>
                        </div>
                    </div>  
                </div>               
            </div>
        </div>
        <div class="row col-md-12 pull-right">
            <div class="col-md-6">
                <div class="bg-warning" style="min-height: 34px;"
                    ng-show="message.crtStaffJob.error">
                    <p class="text-left">
                        [[message.error]]
                    </p>
                </div>
            </div>
            <button
                class="btn btn-danger col-md-3 no-radius" 
                ng-click="deleteStaffJob(dataOnModal.id)">
                Delete
            </button>
            <button 
                class="btn btn-warning col-md-3 no-radius" 
                ng-click="openModal('credStaffModal', 'edit', dataOnModal)">Edit</button>
        </div>
    </script>

    <script type="text/ng-template" id="credStaffModal">
        <div class="row p-b-15">
            <h4 class="modal-title">[[ titlecredStaffModal]]</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Nomor Induk Karyawan</label>
                        <div class="col-sm-8">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nik"
                                ng-model="temp.nik">
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
                        <label class="col-sm-4 no-padding text-left">Staff Job </label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="staff_job"
                                ng-model="temp.staff_job"
                                ng-options="d as d.name for d in listStaffJob">
                            </select>
                        </div>
                    </div>
                    <div class="form-group field p-b-15 row">
                        <label class="col-sm-4 no-padding text-left">Staff Position </label>
                        <div class="col-sm-8">
                            <select 
                                class="form-control m-b" 
                                name="staff_position"
                                ng-model="temp.staff_position"
                                ng-options="d as d.name for d in listStaffPosition">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12 pull-right">
            <div class="col-md-9">
                <div class="bg-warning" style="min-height: 34px;"
                    ng-show="message.crtStaffJob.error">
                    <p class="text-left">
                        [[message.error]]
                    </p>
                </div>
            </div>
            <button 
                class="btn btn-info col-md-3 no-radius"
                ng-show="typecredStaffJob =='tambah'"
                ng-click="createnewStaff()">Tambah</button>
            <button 
                class="btn btn-info col-md-3 no-radius" 
                ng-show="typecredStaffJob =='edit'"
                ng-click="updateStaff()">Update</button>
        </div>
    </script>
@endsection
@section('scripts')
<script src="views/staff/staff.js"></script>
@endsection
