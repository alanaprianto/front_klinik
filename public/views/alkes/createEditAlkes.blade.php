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
                <h3>Nambah Obat & Alkes </h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div ng-controller="ResepCtrl">
        <form class="form-horizontal" role="form" method="POST"
              action=""
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="inventory_id" value="">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kode Produk <span class="error">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="code"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama <span class="error">*</span> </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kategori <span class="error">*</span> </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="Medis" disabled>
                            <input type="hidden" name="category" value="Medis">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tipe <span class="error">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="type"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Total <span class="error">*</span></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="total"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Stok Minimal<span class="error">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="stock_minimal"
                                   value="" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Stok Maksimal<span class="error">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="stock_maximal"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Satuan <span class="error">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="unit" required>
                                
                                    <option value=""></option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Sediaan <span class="error">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="sediaan" required>
                               
                                    <option value=""> </option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Harga Satuan <span
                                    class="error">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="price"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Keterangan</label>
                        <div class="col-sm-8">
                                        <textarea class="form-control"
                                                  name="explain"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <hr>
                <div class="col-md-6">
                    <h3>Tambah Batch</h3>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kode Batch <span class="error">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="batch_code" required>
                        </div>
                    </div>
                   
                        <div class="form-group" >
                            <label class="col-sm-4 control-label">Stock <span class="error">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control datepicker" name="stock"
                                       required >
                            </div>
                        </div>
                  
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Expired Date <span class="error">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" name="expired_date" required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>History Batch</h3>
                    <table id="table-history-batch" class="table datatables">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Stok</th>
                            <th>Expired Date</th>
                            <th>Tanggal Penambahan</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
<script src="views/resep/resep.js"></script>
@endsection
