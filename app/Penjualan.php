<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'tpenjualan';
    protected $fillable = ['tgl_faktur', 'no_faktur', 'pelanggan_id', 'nama_konsumen', 'jumlah', 'harga_satuan', 'ttl_hpp', 'harga_total'];

     public function penjualandetail()
    {
    	return $this->hasMany(PenjualanDetail::class);
    }

    public function getLabaAttribute()
    {
    	// Hitung Laba
    	// $laba = 0;
    	// foreach($penjualan as $pl){
    	// 	$laba = $pl['harga_total'] - $pl['ttl_hpp'] ;
    	// }

    	// return $laba;
    	return $this->harga_total - $this->ttl_hpp;
    }
}
