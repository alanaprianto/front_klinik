@extends('layout.layout')
@section('title')
<title>Apotek .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/pos-framasi.png">
    <span>Apotek</span>
</div>
@endsection
@section('nav')
    @include('layout.navFarmasi')
@endsection
@section('module-content-container')
<nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3> Point Of Sales Apotek </h3>
            </ul>
        </div>
    </nav>
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
            <form>
             <div class="input-group">
               <input type="text" class="form-control" placeholder="Search">
               <div class="input-group-btn">
                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
               </div>
             </div>
           </form>
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
                        <button type="button" class="btn btn-info " style="padding-top: 10px"> OK</button>
                    </div>
                    <div class="pull-right" style="padding: 10px">
                        <button type="button" id="btn-modalpos  col-md-4" class="btn btn-primary"> Racikan</button>
                        <div class="ui small modal">
                          <div class="actions">
                            <div class="ui red basic cancel inverted button">
                              <i class="remove icon"></i>
                            </div>
                          </div>
                          <div class="header">
                            Obat Racikan
                          </div>
                          <div class="content">
                            <p><small>Cari Bahan Racikan</small></p>
                            <form>
                               <div class="input-group">
                                 <input type="text" class="form-control" placeholder="Search">
                                 <div class="input-group-btn">
                                   <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                 </div>
                               </div>
                             </form>
                            <div class="col-md-12" style="background-color:#5DD973; color: #ffffff; margin-top:10px; margin-bottom: 10px ">
                                <p>Jasa Racik </p>
                                <div class="col-lg-1">
                                    <h1>RP </h1>
                                </div>
                                <div class="pull-right">
                                    <h1> 200.000,-</h1>
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color:#72CCCA; color: #ffffff; margin-top:10px; margin-bottom: 10px ">
                                <p>Harga (1) Racik </p>
                                <div class="col-lg-1">
                                    <h1>RP </h1>
                                </div>
                                <div class="pull-right">
                                    <h1> 0,-</h1>
                                </div>
                            </div>
                            <div>
                              <button class="btn btn-info"> tambahkan ketagihan</button>
                            </div>
                            <div>
                              <p>Daftar Bahan Racikan </p>
                            </div>
                            <div>
                              <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Nama Bahan </th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>QTY</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Analgesik</td>
                                    <td>2500</td>
                                    <td>tablet</td>
                                    <td><input type="text" class="form-control"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            </div>
                          </div>
                        </div>
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
                        <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Cetak</button>
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
        <form>
           <div class="input-group">
             <input type="text" class="form-control" placeholder="Search">
             <div class="input-group-btn">
               <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
             </div>
           </div>
         </form>

    </div>
@endsection
@section('scripts')
<script src="views/pos_farmasi/pos_farmasi.js"></script>
@endsection
