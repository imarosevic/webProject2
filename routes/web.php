<?php


//početna stranica 
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

//home page 
Route::get('/home', 'HomeController@index')->name('home');

//uloge
Route::get('/roles', function () {
    return view('roles');
});
Route::post('roles', 'RoleController@insert');

//zakazivanje pregleda
Route::get('/examination', function () {
    return view('examination');
});
Route::post('examination', 'ItemController@insert');

//zakazani pregledi - korisnik usluge
Route::get('/failures', function () {
    return view('failures');
});

//zakazani pregledi - doktor
Route::get('/jobs', function () {
    return view('jobs');
});


//popis svih pregleda
Route::get('/admin', function () {
    return view('admin');
});
