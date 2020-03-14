<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
    	$data_pelanggan = \App\Pelanggan::paginate(5);
    	return view('pelanggan.index_pelanggan', ['data_pelanggan' => $data_pelanggan]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nm_pelanggan' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|min:11',
            'alamat' => 'required',
            'image' => 'mimes:jpg,png',

        ]);

        //Insert table users;
        $user = new \App\User;
        $user->role = 'customer';
        $user->name = $request->nm_pelanggan;
        $user->email= $request->email;
        $user->password = bcrypt('dorayaki');
        $user->remember_token = str_random(60);
        $user->save();

         //Insert table pelanggan
        $request->request->add(['user_id' => $user->id ]);
        $pelanggan = \App\Pelanggan::create($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $pelanggan->image = $request->file('image')->getClientOriginalName();
            $pelanggan->save();
        }
    	return redirect('/sparepart/pelanggan')->with('sukses', 'Data Berhasil diTambahkan');
    }

      public function edit(Pelanggan $pelanggan)
    {
    	// $pelanggan = \App\Pelanggan::find($id);
    	return view ('pelanggan/edit_pelanggan', ['pelanggan' => $pelanggan]);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        // dd($request->all());
    	// $pelanggan = \App\Pelanggan::find($id);
    	$pelanggan->update($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $pelanggan->image = $request->file('image')->getClientOriginalName();
            $pelanggan->save();
        }
    	return redirect('/sparepart/pelanggan')->with('sukses', 'Data Berhasil di Update');
    }

    public function delete(Pelanggan $pelanggan)
    {
        // $pelanggan = \App\Pelanggan::find($id);
        $pelanggan->delete($pelanggan);
        return redirect('/sparepart/pelanggan')->with('sukses', 'Data Berhasil di Delete');
    }

    public function profile(Pelanggan $pelanggan)
    {
        // $pelanggan = \App\Pelanggan::find($id);
        $suplai = \App\Stock::all();

        $suplaiHarga = \App\Stock::pluck('hrg_jual', 'id');
        $bnyk_stock = \App\Stock::pluck('banyak_stock', 'id');
        $hargaPP = \App\Stock::pluck('hrg_pp', 'id');
        // dd($suplaiHarga);
        // dd($bnyk_stock);
        // dd($suplai->toArray());
        return view('pelanggan.profile_konsumen', ['pelanggan' => $pelanggan,'suplai' => $suplai, 'suplaiHarga' => $suplaiHarga, 'bnyk_stock' => $bnyk_stock, 'hargaPP' => $hargaPP]);
    }

    public function addbuy(Request $request, $idpelanggan) 
    {
        // dd($request->all());
        // dd($request->banyak_stock);
        //dd($request->jumlah_beli > $request->banyak_stock);
        if($request->jumlah_beli > $request->banyak_stock)
           {
                return redirect('sparepart/pelanggan/'.$idpelanggan.'/profile')->with('jumlah beli Anda melebihi banyak stok');
           }else{
                 $pelanggan = \App\Pelanggan::find($idpelanggan);
                 $pelanggan->stock()->attach($request->kd_barang, ['jumlah_beli' => $request->jumlah_beli, 'hpp' => $request->hpp,  'total' => $request->total]);
               
                return redirect('sparepart/pelanggan/'.$idpelanggan.'/profile')->with('sukses', 'Data Berhasil di Masukkan');
               
           }

           

         
    }

    public function buyclose($idpelanggan, $idstock)
    {
         $pelanggan = \App\Pelanggan::find($idpelanggan);
         $pelanggan->stock()->detach($idstock);
         return redirect()->back()->with('sukses', 'Data nilai berhasil di Hapus');
         
    }

     public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table mbarang sesuai pencarian data
        $data_pelanggan = DB::table('pelanggan')
        ->where('nm_pelanggan','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data barang ke view index
        return view('pelanggan.index_pelanggan',['data_pelanggan' => $data_pelanggan]);
 
    }

    
}
