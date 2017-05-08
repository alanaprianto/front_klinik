<?php


Route::get('/', function () {
    return redirect('login');
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/login', function() {
    return View::make('login.login');
    });
Route::get('/registasi', function() {
        return View::make('register.registasi');
});
Route::get('/dashboard', function() {
    return View::make('dashboard.dashboard');
});
Route::get('/inventori', function() {
    return View::make('inventori.inventori');
});
Route::get('/apotek', function() {
    return View::make('farmasi.farmasi');
});
Route::get('/createEditResep', function() {
    return View::make('resep.createEditResep');
});
Route::get('/pos_farmasi', function() {
    return View::make('pos_farmasi.pos_farmasi');
});
Route::get('/kasir', function() {
    return View::make('kasir.kasir');
});

Route::get('/keuangan', function() {
    return View::make('keuangan.keuangan');
});
Route::get('/kepegawaian', function() {
    return View::make('kepegawaian.kepegawaian');
});
Route::get('/rawatinap', function() {
    return View::make('rawatinap.rawatinap');
});
Route::get('/rekammedis', function() {
    return View::make('rekammedis.rekammedis');
});
Route::get('/masterdata', function() {
    return View::make('masterdata.masterdata');
});
Route::get('/loket', function() {
    return View::make('loket.loket');
});
Route::get('/managementUser', function() {
    return View::make('managementUser.managementUser');
});
Route::get('/logout', function() {
    return View::make('logout.logout');
});
Route::get('/pendaftaranPasien', function() {
    return View::make('pendaftaranPasien.pendaftaranPasien');
});
Route::get('/createEditPendaftaranPasien', function() {
    return View::make('pendaftaranPasien.createEditPendaftaranPasien');
});
Route::get('/dataPengunjung', function() {
    return View::make('dataPengunjung.dataPengunjung');
});
Route::get('/pengunjungKasir', function() {
    return View::make('dataPengunjung.pengunjungKasir');
});
Route::get('/pengunjungLoket', function() {
    return View::make('dataPengunjung.pengunjungLoket');
});
Route::get('/nonAlkes', function() {
    return View::make('nonalkes.nonAlkes');
});
Route::get('/createEditNonAlkes', function() {
    return View::make('nonalkes.createEditNonAlkes');
});
Route::get('/alkes', function() {
    return View::make('alkes.alkes');
});
Route::get('/createEditAlkes', function() {
    return View::make('alkes.createEditAlkes');
});
Route::get('/resep', function() {
    return View::make('resep.resep');
});
Route::get('/penata_jasa', function() {
    return View::make('rawatjalan.rawatjalan');
});
Route::get('/poli_anak', function() {
    return View::make('antrianRawatJalan.antrianPoli');
});
Route::get('/poli_gigi', function() {
    return View::make('antrianRawatJalan.antrianPoli');
});
Route::get('/poli_umum', function() {
    return View::make('antrianRawatJalan.antrianPoli');
});
Route::get('/antrian', function() {
    return View::make('antrian.antrian');
});
Route::get('/kunjunganPoliGigi', function() {
    return View::make('kunjungan.kunjunganPoliGigi');
});
Route::get('/kunjunganPoliAnak', function() {
    return View::make('kunjungan.kunjunganPoliAnak');
});
Route::get('/kunjunganPoliUmum', function() {
    return View::make('kunjungan.kunjunganPoliUmum');
});
Route::get('/pengunjungPoliUmum', function() {
    return View::make('pengunjungRawatJalan.pengunjungPoliUmum');
});
Route::get('/pengunjungPoliAnak', function() {
    return View::make('pengunjungRawatJalan.pengunjungPoliAnak');
});
Route::get('/pengunjungPoliGigi', function() {
    return View::make('pengunjungRawatJalan.pengunjungPoliGigi');
});
Route::get('/staff', function() {
    return View::make('staff.staff');
});
Route::get('/createEditStaff', function() {
    return View::make('staff.createEditStaff');
});
Route::get('/staffJob', function() {
    return View::make('staffJob.staffJob');
});
Route::get('/createStaffJob', function() {
    return View::make('staffJob.createStaffJob');
});
Route::get('/staffPosition', function() {
    return View::make('staffPosition.staffPosition');
});
Route::get('/createStaffPosition', function() {
    return View::make('staffPosition.createStaffPosition');
});
Route::get('/data_patient', function() {
    return View::make('dataPasien.dataPasien');
});
Route::get('/kiosk', function() {
    return View::make('kiosk.kiosk');
});
Route::get('/display', function() {
    return View::make('display.display');
});