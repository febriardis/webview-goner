<?php

//use App\Transaksi;

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

Route::get('/', function () {return view('Auth.login');})->middleware('guest');//--
Route::post('/login', 'AuthController@login');
Route::get('/keluar', 'AuthController@keluar');
Route::get('/register', function () {return view('Auth.regist');})->middleware('guest');//--
Route::post('/register', 'AuthController@regist');
//=================================================================
Route::get('/home', 'KategoriController@showall')->middleware('auth:users'); //--
Route::get('/warung', 'WarungController@showall')->middleware('auth:users');
Route::get('/kategori','KategoriController@showall')->middleware('auth:users');; //--
Route::get('/barang/{id}', 'BarangController@show')->middleware('auth:users');
//================================================================
Route::get('/tambahkanwarung', 'WarungController@viewTambah')->middleware('auth:users');
Route::post('/tambahwarung', 'WarungController@insert');
//================================================================
Route::get('/tambahkankategori', 'KategoriController@viewTambah')->middleware('auth:users');
Route::post('/tambahkategori', 'KategoriController@insert');
//================================================================
Route::get('/tambahkanbarang', 'BarangController@viewTambah')->middleware('auth:users');
Route::post('/tambahbarang', 'BarangController@insert');
//================================================================
Route::get('/formtransaksi/{id}', 'TransaksiController@formTrans')->middleware('auth:users');
Route::post('/tambahtransaksi', 'TransaksiController@simpanTrans');

// Route::get('/coba',function(){	$data = Transaksi::all();
//return view('coba')->with('val',$data);});






//==========================USET====================================
Route::get('/showuser', 'AuthController@show');
Route::get('/hapususer/{id}', 'AuthController@delete');
//Route::post('/register', 'AuthController@regist');
//Route::post('/login', 'AuthController@login');
//==========================WARUNG==================================

Route::get('/showwarung', 'WarungController@showall');
Route::get('/findwarung/{id}', 'WarungController@find');
//Route::post('/tambahwarung', 'WarungController@insert');
Route::put('/updatewarung/{id}', 'WarungController@update');
Route::get('/hapuswarung/{id}', 'WarungController@delete');
//==========================KATEGORI================================
Route::get('/showkategori', 'KategoriController@showall');
Route::get('/findkategori/{id}', 'KategoriController@find');
//Route::post('/tambahkategori', 'KategoriController@insert');
Route::put('/updatekategori/{id}', 'KategoriController@update');
Route::get('/hapuskategori/{id}', 'KategoriController@delete');
//==========================BARANG==================================
Route::get('/showbarang', 'KategoriController@showall');
Route::get('/findbarang/{id}', 'KategoriController@find');
//Route::post('/tambahbarang', 'KategoriController@insert');
Route::put('/updatebarang/{id}', 'KategoriController@update');
Route::get('/hapusbarang/{id}', 'KategoriController@delete');
//================================================================