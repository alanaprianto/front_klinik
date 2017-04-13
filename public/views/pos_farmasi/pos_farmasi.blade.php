@extends('layout.layout')
@section('title')
<title>POS Farmasi .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/pos-framasi.png">
    <span>POS Farmasi</span>
</div>
@endsection
@section('content')
    <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px; border-bottom: 2px solid #B3B3B3">
        <div class="col-md-6 no-padding">
            <span>Kamis, 2 Februari 2017 18:29:00</span>
            <h4>Petugas: Lucky Lukman Alamsah</h4>
        </div>
        <div class="col-md-6 no-padding">
            <div class="pull-right">
                <button class="btn btn-info">
                    <i class="fa fa-search"></i> CEK BARANG
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-12" style="padding-top: 10px; padding-bottom: 10px;">
        <div class="col-md-6 ">
            <p>
                <small>Cari barang:</small>
            </p>
            <input type="text" class="form-control" value="" placeholder="search ...">
            <div class="col-md-12" style="padding-top: 10px">
                <div class="col-md-4">
                    <input type="text" class="form-control" value="" placeholder="Harga Satuan">
                    <p>
                        <small>jenis satuan barang</small>
                    </p>
                </div>
                <div class="col-md-1">
                    <h2>X</h2>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" value="" placeholder="">
                </div>
                <div class="col-lg-3">
                    <div class="pull-right">
                        <button type="button" class="btn btn-info" style="padding-top: 10px"> OK</button>
                    </div>
                    <div class="pull-right" style="padding: 10px">
                        <button type="button" class="btn btn-info"> Racikan</button>
                    </div>
                </div>

                <div class="row" style="padding-top: 10px">
                    <p>
                        <small>Nominal Yang dibayar</small>
                    </p>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-warning"> Cetak</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6" style="background-color:#FE8A71; color: #ffffff;  margin-bottom: 10px ">
            <p>Total Tagihan </p>
            <div class="col-lg-1">
                <h1>RP </h1>
            </div>
            <div class="pull-right">
                <h1> 200.000,-</h1>
            </div>
        </div>
        <div class="col-md-6" style="background-color:#72CCCA; color: #ffffff ; margin-bottom: 10px">
            <p>Pembayaran</p>
            <div class="col-lg-1">
                <h1>RP </h1>
            </div>
            <div class="pull-right">
                <h1> 200.000,-</h1>
            </div>
        </div>
        <div class="col-md-6" style="background-color:#5DD973; color: #ffffff; margin-bottom: 10px ">
            <p>Kembalian </p>
            <div class="col-lg-1">
                <h1>RP </h1>
            </div>
            <div class="pull-right">
                <h1> 0,-</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <p>
            Customer Receipt
        </p>
        <input type="text" class="form-control" value="" placeholder="search ...">

    </div>
@endsection
