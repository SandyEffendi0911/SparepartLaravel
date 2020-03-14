<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        // if($request->has('cari')){
        //     $data_barang = \App\Barang::where('kode_barang', 'LIKE', '%' .$request->cari. '%')->get();
        // } else {
        //     $data_barang = \App\Barang::paginate(5);
        // }
        $data_barang = \App\Barang::paginate(5);
    	return view('sparepart.index', ['data_barang' => $data_barang]);
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
            'kode_barang' => 'required|min:2',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',

        ]);

        \App\Barang::create($request->all());
    	return redirect('/sparepart')->with('sukses', 'Data Berhasil di Tambahkan');
    }

      public function edit($id)
    {
    	$barang = \App\Barang::find($id);
    	return view ('sparepart/edit', ['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
    	$barang = \App\Barang::find($id);
    	$barang->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $barang->avatar = $request->file('avatar')->getClientOriginalName();
            $barang->save();
        }
    	return redirect('/sparepart')->with('sukses', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $barang = \App\Barang::find($id);
        $barang->delete($barang);
        return redirect('/sparepart')->with('sukses', 'Data Berhasil di Delete');
    }

     public function profile($id)
    {
        $barang = \App\Barang::find($id);
        return view('sparepart.profile', ['barang' => $barang]);
    }


    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table mbarang sesuai pencarian data
        $data_barang = DB::table('mbarang')
        ->where('kode_barang','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data barang ke view index
        return view('sparepart.index',['data_barang' => $data_barang]);
 
    }
}
