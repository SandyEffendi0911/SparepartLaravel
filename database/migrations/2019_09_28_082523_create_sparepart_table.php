<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tgl_faktur');
            $table->string('no_faktur');
            $table->string('nama_konsumen');
            $table->string('kode_barang');
            $table->integer('jumlah');
            $table->integer('harga_satuan');
            $table->decimal('harga_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_penjualan');
    }
}
