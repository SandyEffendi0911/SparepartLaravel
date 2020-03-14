<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'mbarang';
    protected $fillable = ['kode_barang', 'nama_barang', 'harga_jual', 'harga_beli', 'avatar'];

    public function getGambar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('/images/'.$this->avatar);
    }
}
