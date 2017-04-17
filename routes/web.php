<?php


Route::get('/', function () {
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
Route::get('/farmasi', function() {
    return View::make('farmasi.farmasi');
});
Route::get('/pos_farmasi', function() {
    return View::make('pos_farmasi.pos_farmasi');
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
