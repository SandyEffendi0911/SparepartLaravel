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

Route::get('/', 'SiteController@home');
Route::get('/about', 'SiteController@about');
Route::get('/daftar/pelanggan', 'SiteController@daftar');

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {

	Route::get('/sparepart', 'BarangController@index');
	Route::post('/sparepart/create', 'BarangController@create');
	Route::get('/sparepart/cari', 'BarangController@cari');
	Route::get('/sparepart/{id}/edit', 'BarangController@edit');
	Route::post('/sparepart/{id}/update', 'BarangController@update');
	Route::get('/sparepart/{id}/delete', 'BarangController@delete');
	Route::get('/sparepart/{id}/profile', 'BarangController@profile');

	Route::get('/sparepart/stock', 'StockController@index');
	Route::post('/sparepart/stock/create', 'StockController@create');
	Route::get('/sparepart/stock/cari', 'StockController@cari');
	Route::get('/sparepart/stock/{id}/edit', 'StockController@edit');
	Route::post('/sparepart/stock/{id}/update', 'StockController@update');
	Route::get('/sparepart/stock/{id}/delete', 'StockController@delete');
	Route::get('/sparepart/stock/{id}/profile', 'StockController@profile');

	Route::get('sparepart/pelanggan', 'PelangganController@index');
	Route::post('sparepart/pelanggan/create', 'PelangganController@create');
	Route::get('sparepart/pelanggan/cari', 'PelangganController@cari');
	Route::get('/sparepart/pelanggan/{pelanggan}/profile', 'PelangganController@profile');
	Route::get('/sparepart/pelanggan/{pelanggan}/edit', 'PelangganController@edit');
	Route::post('/sparepart/pelanggan/{pelanggan}/update', 'PelangganController@update');
	Route::get('/sparepart/pelanggan/{pelanggan}/delete', 'PelangganController@delete');
	Route::post('/sparepart/pelanggan/{id}/addbuy', 'PelangganController@addbuy');
	Route::get('/sparepart/pelanggan/{id}/{idstock}/buyclose', 'PelangganController@buyclose');

	Route::get('/sparepart/penjualan', 'PenjualanController@index');
	Route::post('/sparepart/penjualan/create', 'PenjualanController@create');
	Route::get('/sparepart/penjualan/cari', 'PenjualanController@cari');
	Route::get('/sparepart/penjualan/{id}/read', 'PenjualanController@read');
	Route::get('/sparepart/penjualan/{id}/idpdf', 'PenjualanController@exportIdPdf');
	Route::get('/sparepart/penjualan/{id}/delete', 'PenjualanController@delete');
	Route::get('/sparepart/penjualan/readall', 'PenjualanController@readall');
	Route::get('/sparepart/penjualan/rekapall', 'PenjualanController@rekapall');
	Route::get('/sparepart/penjualan/exportexcel', 'PenjualanController@exportExcel');
	Route::get('/sparepart/penjualan/exportpdf', 'PenjualanController@exportPdf');
	Route::get('/sparepart/penjualan/exportduaexcel', 'PenjualanController@exportDuaExcel');
	Route::get('/sparepart/penjualan/exportduapdf', 'PenjualanController@exportDuaPdf');
	
});

Route::group(['middleware' => ['auth', 'checkRole:admin,customer']], function() {
	Route::get('/dashboard', 'DashboardController@index');
});
	