<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/foto', function(){ return public_path('uploads\file\235021724.jpg'); })->middleware('auth:users');

Route::get('/', function () {return view('Auth.login');})->middleware('guest');//--
Route::post('/login', 'AuthController@login');
Route::get('/keluar', 'AuthController@keluar');
Route::get('/register', function () {return view('Auth.regist');})->middleware('guest');//--
Route::post('/register', 'AuthController@regist');
//=================================================================
Route::get('/home', 'KategoriController@showinHome')->middleware('auth:users'); //--pembeli
Route::get('/warung', 'WarungController@showall')->middleware('auth:users'); //--pembeli
Route::get('/barangwarung/{idWarung}', 'BarangController@showBarangWarung')->middleware('auth:users'); //--pembeli
Route::get('/barang/{id}', 'BarangController@show')->middleware('auth:users'); //--pembeli
Route::get('/kategori','KategoriController@showallkat')->middleware('auth:users'); //--pembeli
Route::get('/tabelpesanan/{userid}','TransaksiController@showPesanan')->middleware('auth:users'); //--pembeli
Route::get('/konfirmstatus/{id}','TransaksiController@konfStatus')->middleware('auth:users'); //--pembeli
Route::get('/batalpesanan/{id}','TransaksiController@batalPesanan')->middleware('auth:users'); //--Penjual
//================================================================
Route::get('/tambahkanwarung', 'WarungController@viewTambah')->middleware('auth:users');//--user biasa
Route::post('/tambahwarung', 'WarungController@insert');//--user biasa
Route::get('/hapuswarung/{userid}', 'WarungController@delete');//--Penjual
//================================================================
Route::get('/formtransaksi/{id}', 'TransaksiController@formTrans')->middleware('auth:users');//--Pembeli
Route::post('/tambahtransaksi', 'TransaksiController@simpanTrans');//--Pembeli
Route::get('/detail pesanan/{id}', 'TransaksiController@detail')->middleware('auth:users');//--Pembeli
//================================================================
Route::get('/tabelpembeli/{idUser}', 'TransaksiController@showTabelPembeli')->middleware('auth:users');//--Penjual
Route::get('/tabelpenjualan/{idUser}', 'BarangController@showTabelBarangWarung')->middleware('auth:users');//--Penjual
Route::get('/cancelpesanan/{id}','TransaksiController@cancPesanan')->middleware('auth:users'); //--Penjual
Route::get('/tambahkanbarang', 'BarangController@viewTambah')->middleware('auth:users');//--Penjual
Route::post('/tambahbarang', 'BarangController@insert');//--Penjual
Route::get('/editbarang/{id}', 'BarangController@viewEdit')->middleware('auth:users');//--Penjual
Route::post('/updatebarang/{id}', 'BarangController@update');//--Penjual
Route::get('/hapusbarang/{id}', 'BarangController@delete');//--Penjual
Route::get('/tabelpembeli/{idUser}', 'TransaksiController@showTabelPembeli')->middleware('auth:users');//--Penjual
//================================================================


//=========================ADMIN==================================
Route::get('/tambahkankategori', 'KategoriController@viewTambah')->middleware('auth:users');//--admin
Route::post('/tambahkategori', 'KategoriController@insert');//--admin






//==========================USET====================================
Route::get('/showuser', 'AuthController@show');
Route::get('/hapususer/{id}', 'AuthController@delete');
//Route::post('/register', 'AuthController@regist');
//Route::post('/login', 'AuthController@login');
//==========================WARUNG==================================

// Route::get('/showwarung', 'WarungController@showall');
// Route::get('/findwarung/{id}', 'WarungController@find');
// //Route::post('/tambahwarung', 'WarungController@insert');
// Route::put('/updatewarung/{id}', 'WarungController@update');
// Route::get('/hapuswarung/{id}', 'WarungController@delete');
//==========================KATEGORI================================
// Route::get('/showkategori', 'KategoriController@showall');
// Route::get('/findkategori/{id}', 'KategoriController@find');
// //Route::post('/tambahkategori', 'KategoriController@insert');
// Route::put('/updatekategori/{id}', 'KategoriController@update');
// Route::get('/hapuskategori/{id}', 'KategoriController@delete');
//==========================BARANG==================================
// Route::get('/showbarang', 'KategoriController@showall');
// Route::get('/findbarang/{id}', 'KategoriController@find');
// //Route::post('/tambahbarang', 'KategoriController@insert');
// Route::put('/updatebarang/{id}', 'KategoriController@update');
// Route::get('/hapusbarang/{id}', 'KategoriController@delete');
//================================================================