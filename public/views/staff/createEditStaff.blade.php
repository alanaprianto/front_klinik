
@extends('layout.layout')
@section('title')
    <title>kepegawaian .: Teknohealth :. </title>
    <link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
    <div class="module-left-title">
        <div class="module-left-bars"><i class="ti-menu"></i></div>
        <img src="assets/images/logo/kepegawaian.png">
        <span>KEPEGAWAIAN</span>
    </div>
@endsection
@section('nav')
    @include('layout.navKepegawaian')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>TAMBAH STAFF</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div class="col-md-12" style="text-align: center">
        <form class="form-horizontal" role="form" method="POST"
              action="{{url('')}}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
         
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">NIK</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nik" required value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Nama Lengkap</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="full_name" required
                           value="">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">TTL</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="Tempat" name="place"
                           value=""></div>
                <div class="col-sm-2">
                    <input type="date" class="form-control date-1" name="birth" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Umur</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="age" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Agama</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" name="religion" required
                            value="">
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Jenis Kelamin</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" name="gender" required value="">
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Pendidikan</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" name="last_education"
                            value="">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">No Telp</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" required name="phone_number"
                           value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Staff Job</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" required name="staff_job_id">
                       
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Staff Posisi</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" required name="staff_position">
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Alamat</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="address" required
                              value=""></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Provinsi</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" required name="province" id="province"
                            value="">
                       
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Kota</label>
                <div class="col-sm-4">
                    <select class="form-control m-b" name="city" id="city" value="">
                        <option>-</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Kecamatan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="district" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Kelurahan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="sub_district"
                           value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 text-left">Nama Dusun /RT/RW</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="rt_rw" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <button class="btn btn-primary col-md-6" type="submit">Daftar</button>
                    <a href="/staff" class="btn btn-white col-md-6" type="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
<script src="views/staff/staff.js"></script>
@endsection
