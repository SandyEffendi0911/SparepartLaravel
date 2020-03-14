<?php

use \App\Stock;
use \App\Pelanggan;
use \App\Barang;
use \App\Penjualan;
use \App\PenjualanDetail;

function totalStock(){
	return Stock::count();
}

function totalPelanggan(){
	return Pelanggan::count();
}

function totalBarang(){
	return Barang::count();
}

function totalPenjualan(){
	return Penjualan::count();
}

function totalPenjualanDetail(){
	return PenjualanDetail::count();
}