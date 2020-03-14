<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function index(){

    	$data_stock = \App\Stock::paginate(5);

    	return view('stok.index_stock', ['data_stock' => $data_stock]);
    }

    public function create(Request $request){

        $this->validate($request, [
            'kd_barang' => 'required|min:2|unique:stock',
            'nm_barang' => 'required',
            'hrg_pp' => 'required',
            'hrg_jual' => 'required',
            'diskon' => 'required',
            'banyak_stock' => 'required',

        ]);

    	\App\Stock::create($request->all());
    	return redirect('/sparepart/stock')->with('sukses', 'Data Berhasil di Tambahkan');
    }

      public function edit($id)
    {
    	$stock = \App\Stock::find($id);
    	return view ('stok/edit_stock', ['stock' => $stock]);
    }

     public function update(Request $request, $id)
    {
    	$stock = \App\Stock::find($id);
    	$stock->update($request->all());
         if($request->hasFile('img')){
            $request->file('img')->move('images/',$request->file('img')->getClientOriginalName());
            $stock->img = $request->file('img')->getClientOriginalName();
            $stock->save();
        }
    	return redirect('/sparepart/stock')->with('sukses', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $stock = \App\Stock::find($id);
        $stock->delete($stock);
        return redirect('/sparepart/stock')->with('sukses', 'Data Berhasil di Delete');
    }

      public function profile($id)
    {
        $stock = \App\Stock::find($id);
        return view('stok.profile_stok', ['stock' => $stock]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table mbarang sesuai pencarian data
        $data_stock = DB::table('stock')
        ->where('kd_barang','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data barang ke view index
        return view('stok.index_stock',['data_stock' => $data_stock]);
 
    }
}
