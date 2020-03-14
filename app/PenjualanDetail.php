<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    protected $table = 'detail_penjualan';
    protected $fillable = ['penjualan_id', 'kd_barang', 'nm_barang', 'harga_beli', 'diskon', 'qty'];


    public function penjualan()
    {
    	return $this->belongsTo(Penjualan::class);
    }

     public function getJumlahAttribute()
    {
    	
    	return $this->harga_beli * $this->qty;
    }

}





