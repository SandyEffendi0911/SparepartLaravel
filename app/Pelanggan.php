<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = ['nm_pelanggan', 'jenis_kelamin', 'no_hp', 'alamat', 'image', 'user_id'];

    public function getAvatar()
    {
    	if(!$this->image){
    		return asset('images/default.jpg');
    	}

    	return asset('/images/'.$this->image);
    }

    public function stock()
    {
    	return $this->belongsToMany(Stock::class)->withPivot(['total','jumlah_beli','hpp']);

    }
}
