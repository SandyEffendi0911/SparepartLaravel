<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $fillable = ['kd_barang', 'nm_barang', 'hrg_pp', 'hrg_jual', 'banyak_stock', 'img', 'diskon'];

     public function getImage()
    {
    	if(!$this->img){
    		return asset('images/default.jpg');
    	}

    	return asset('/images/'.$this->img);
    }

    public function pelanggan()
    {
    	return $this->belongsToMany(Pelanggan::class)->withPivot(['total', 'jumlah_beli', 'hpp']);
    }
}
