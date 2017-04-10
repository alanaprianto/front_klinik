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