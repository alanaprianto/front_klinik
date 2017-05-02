@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="views/dataPasien/dataPasien.css">
@endsection
@section('view')
    @include('sidebar.sidebar')
    <div id="dataPasien-area" ng-controller="DaftarPasienCtrl" class="module-content-container">
        <div class="row no-margin">
            <div class="col-md-12">
                <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Telepon</th>
                            <th>Terakhir Kunjungan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="visitor in tableListVisitor">
                            <td>[[$index + 1]]</td>
                            <td>[[visitor.number_medical_record]]</td>
                            <td>[[visitor.full_name]]</td>
                            <td>[[visitor.gender]]</td>
                            <td>[[visitor.age]]</td>
                            <td>[[visitor.phone_number]]</td>
                            <td></td>
                            <td>
                                <button class="btn btn-xs btn-default"
                                    ng-click="openModal('detaiPasienModal', '', pasiens)">
                                    <i class="fa fa-search-plus"></i> Detail Pasien
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <script type="text/ng-template" id="detaiPasienModal">
        <div class="row p-b-15">
            <h4 class="modal-title">Detail Pasien </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="row p-b-15">
                        <div class="col-md-4">
                            <p class="text-left">Nomor Rekam Medis</p>
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
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Jenis Kelamin</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Alamat</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Nomber Telpon</p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Pekerjaan </p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Jumlah Pendaftaran </p>
                        </div>
                        <div class="col-md-8">
                            <p class="text-left">[[dataOnModal.patient.full_name]]</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">Jumlah Kunjungan  </p>
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
                    <h3>Data Pendaftaran</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Nomor</th>
                <th>No Pendaftaran</th>
                <th>Waktu</th>
                <th>Tipe Layanan</th>
                <th>Poli Rujukan</th>
            </tr>
            </thead>
            <tbody>
          
                <tr>
                    <td>[[$index + 1]]</td>
                    <td>[[$register->register_number]]</td>
                    <td>[[$register->created_at]]</td>
                    <td>[[$register->service_type]]</td>
                    <td>
                        <button  data-toggle="collapse" data-target=".demo[[$index]]" class="accordion-toggle"><i class="fa fa-eye"></i></button>
                    </td>
                </tr>
                <tr>
                    <th class="hiddenRow">
                        <div class="accordian-body collapse demo[[$index]]"> Poli Tujuan</div>
                    </th>
                    <th class="hiddenRow">
                        <div class="accordian-body collapse demo[[$index]]"> Diperiksa Oleh</div>
                    </th>
                    <th class="hiddenRow">
                        <div class="accordian-body collapse demo[[$index]]"> Waktu</div>
                    </th>
                    <th colspan="2" class="hiddenRow">
                        <div class="accordian-body collapse demo[[$index]]"> Status</div>
                    </th>
                </tr>

                    <tr>
                        <td class="hiddenRow">
                            <div class="accordian-body collapse demo[[$index]]"> [[$reference->poly->name]]</div>
                        </td>
                        <td class="hiddenRow">
                            <div class="accordian-body collapse demo[[$index]]">[[$reference->doctor->full_name]]</div>
                        </td>
                        <td class="hiddenRow">
                            <div class="accordian-body collapse demo[[$index]]">[[$reference->created_at]]</div>
                        </td>
                        <td colspan="2" class="hiddenRow">
                            <div class="accordian-body collapse demo[[$index]]"> [[  $reference->final_result]]</div>
                        </td>
                    </tr>
                       <tr>
                        <td class="hiddenRow" colspan="5">
                            <div class="accordian-body collapse demo[[$index]]"> -</div>
                        </td>
                    </tr>

                <tr>
                    <td colspan="5">Belum Ada Registrasi</td>
                </tr>

            </tbody>
        </table>
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
@endsection
@section('scripts')
    <script src="views/dataPasien/dataPasien.js"></script>
@endsection