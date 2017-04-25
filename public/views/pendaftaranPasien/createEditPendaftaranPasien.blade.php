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
        <div class="row ">
                <div class="col-md-12 text-center">
                    <form class="form-inline form-rm">
                        <div class="form-group field">
                            <label>Cari Pasien</label>
                            <input type="text" class="form-control typeahead" name="number_mr"
                                   placeholder="name, No Rm">
                            <button type="submit" class="btn btn-primary">Cek</button>
                        </div>
                    </form>
                </div>
            <br/>
            <form method="post" class="form-horizontal ui form" id="form_register">
                <input type="hidden" name="" value="">
                <input type="hidden" name="patient_number_id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">No RM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="number_medical_record"
                                       id="number_medical_record">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="full_name">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">TTL</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Tempat" name="place"></div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control date-1" name="birth">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Umur</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="age">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="gender">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Agama</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="religion">
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Provinsi / Kota</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="province" id="province">
                                   
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="city" id="city">
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Kecamatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="district">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Kelurahan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sub_district">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Nama Dusun /RT/RW</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="rt_rw">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">No Telp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone_number">
                            </div>
                        </div>
                        <div class="form-group field"><label class="col-sm-4 control-label">Pendidikan</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="last_education">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group field"><label class="col-sm-4 control-label">Pekerjaan</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="job">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">No Jamkesmas / Jamkesda / ASKES
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="askes_number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Nama Penanggung Jawab</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="responsible_person">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Status Penanggung Jawab</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="responsible_person_state">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Sebab Sakit</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="cause_pain"></textarea>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Cara Kunjungan</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="how_visit">
                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Jam Kedatangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control time-1" name="time_attend">
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Tipe Layanan</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="service_type">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Klinik</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="poly" id="clinic">
                                    <option>-</option>
                                 
                                </select>
                            </div>
                        </div>
                        <div class="form-group field">
                            <label class="col-sm-4 control-label">Nama Dokter</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="doctor" id="doctors">
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group field">
                        <div class="col-sm-10 col-sm-offset-5">
                            <button class="btn btn-primary" type="submit">Daftar</button>
                            <button class="btn btn-primary" type="button" onclick="printModal()">Print</button>
                            <a href="{{url('pendaftaranPasien')}}" class="btn btn-secondary" type="button">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="views/pendaftaranPasien/pendaftaranPasien.js"></script>
@endsection