<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeleteBeli extends Model
{
    protected $table = 'pelanggan_stock';
    protected $fillable = ['penjualan_id', 'stock_id', 'jumal_beli', 'total'];
}
