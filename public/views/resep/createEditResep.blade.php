@extends('layout.layout')
@section('title')
<title>Faramasi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/farmasi-101.png">
    <span>Farmasi</span>
</div>
@endsection
@section('nav')
    @include('layout.navFarmasi')
@endsection
@section('module-content-container')
    <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Nambah Resep</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div ng-controller="ResepCtrl">
        <form class="form-horizontal form-apotek" role="form" method="POST"
            action="{{url('/apotek/resep/post')}}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="reference_id" id="reference_id">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="full_name" id="full_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="gender" id="gender">
                               
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone_number"
                                   id="phone_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="address" id="address"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <div class="action">
                        <button type="button" class="btn btn-primary btn-tuslah"><i class="fa fa-plus">
                                Biaya Tuslah</i></button>
                    </div>
                    <table class="table table-tuslah" hidden>
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="35%">Nama / Jenis Tuslah</th>
                            <th width="20%">Jumlah</th>
                            <th width="20%">Satuan / Harga</th>
                            <th width="20%">Total</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <hr/>
                    <table class="table table-apotek">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="35%">Nama Alkes / Non Alkes</th>
                            <th width="20%">Jumlah</th>
                            <th width="20%">Harga Satuan</th>
                            <th width="20%">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="clone">
                            <td>
                                <button class="btn btn-primary btn-plus" type="button"><i
                                            class="fa fa-plus"></i>
                                </button>
                            </td>
                            <td>
                                <select class="form-control inventory" name="inventory[]">
                                    <option>--Pilih Obat--</option>
                                   
                                </select>
                            </td>
                            <td><input type="number" class="form-control amount" min="1" name="amount[]">
                            </td>
                            <td></td>
                            <td class="sum-amount"></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2">Total Pembayaran</th>
                            <th colspan="3" class="text-right">Rp.<span class="total-amount">0</span></th>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
<script src="views/resep/resep.js"></script>
@endsection
