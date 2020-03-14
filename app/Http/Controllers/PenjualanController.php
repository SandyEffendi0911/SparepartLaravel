<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PenjualanExport;
use App\Exports\PenjualanDetailExport;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use PDF;

class PenjualanController extends Controller
{
     public function index()
    {
    	$data_penjualan = \App\Penjualan::paginate(5);
    	return view('penjualan.index_penjualan', ['data_penjualan' => $data_penjualan]);
    }

    public function create(Request $request)
    {
    	//Insert tpenjualan	
    	$data = $request->all();
        // return dd($data);
    	$data['no_faktur'] = str_pad('FAK', 5, 0, STR_PAD_RIGHT);
    	$penjualan = \App\Penjualan::create($data); 

    	$penjualan->no_faktur = 'FAK'.str_pad($penjualan->id, 5, 0, STR_PAD_LEFT);
    	$penjualan->save();

        $details = $request->details;
        foreach ($details as $detail) {
            $detail['penjualan_id'] = $penjualan->id;
            $detail_penjualan = \App\PenjualanDetail::create($detail); 

            // $kode_barang = $detail['kd_barang'];
            // $stock = \App\Stock::where('kd_barang', $kode_barang)->first();
            // dump($stock);
            // dump($kode_barang);
            // dd( $detail);

            // kurangi stok
            // cari stok berdasarkan id
            $kode_barang = $detail['kd_barang'];
            $barang = \App\Stock::where('kd_barang', $kode_barang)->first();
            $stok_awal = $barang->banyak_stock;
            $jumlah_jual = $detail['qty'];
            $stok_baru = $stok_awal - $jumlah_jual;
            // update
            $barang->banyak_stock = $stok_baru;
            $barang->save();
 
        }
        // where(....)->delete()
        $pelanggan_id = $request->pelanggan_id;
        $delete_beli = \App\DeleteBeli::where('pelanggan_id', $pelanggan_id)->delete();

        // dd($delete_beli);
        // hapus data sementara
        // hapus data berdarkan idpelanggan 
        
    	return redirect('/sparepart/penjualan')->with('sukses', 'Data Berhasil di Kirim');
    }


    public function read($id)
    {
        $penjualan = \App\Penjualan::find($id);
        $detailpenjualan = $penjualan->penjualandetail;
            
        return view('penjualan.profile_penjualan', ['penjualan' => $penjualan, 'detailpenjualan' => $detailpenjualan]);
    }

     public function readall()
    {
        $detailpenjualan = \App\PenjualanDetail::all();
        $penjualan = \App\Penjualan::all();
        // $detailpenjualan = \App\PenjualanDetail::with('penjualan')->paginate(5);

        // chart penjualan
        // $penjualan = \App\Penjualan::all();

        $categories = [];
        $data = [];
        // $nofaktur =[];
       
        foreach ($detailpenjualan as $nb) {
            $categories[] = $nb->nm_barang;
            $data[] = $nb->qty;
            // $nofaktur = $nb->penjualan->no_faktur;
        }

        // dd($nofaktur);
        // dd(json_encode($categories));
            
        return view('penjualan.laporan_penjualan', ['detailpenjualan' => $detailpenjualan, 'categories' => $categories, 'data' => $data ]);
    }

     public function rekapall()
    {
        $detailpenjualan = \App\PenjualanDetail::all();
        $penjualan = \App\Penjualan::all();
        // $penjualan = \App\Penjualan::paginate(5);
        // $penjualan = \App\Penjualan::with('penjualandetail')->paginate(5);
            
        return view('penjualan.rekap_penjualan', ['penjualan' => $penjualan, 'detailpenjualan' => $detailpenjualan ]);
    }

     public function exportExcel() 
    {
        // return \App\Penjualan::first()->laba;
        return Excel::download(new PenjualanExport, 'Penjualan.xlsx');
    }

    public function exportPdf()
    {
         // $pdf = PDF::loadHTML('<h1>DATA PENJUALAN</h1>');
        $penjualan = \App\Penjualan::all();
        $pdf = PDF::loadView('export.penjualanpdf', ['penjualan' => $penjualan]);
        return $pdf->download('penjualan.pdf');
    }

    public function delete($id)
    {
        
         $penjualan = \App\Penjualan::find($id);
         $penjualan->penjualandetail()->delete();
         $penjualan->delete($penjualan);
         return redirect()->back()->with('sukses', 'Data nilai berhasil di Hapus');

    }

      public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table mbarang sesuai pencarian data
        $data_penjualan = DB::table('tpenjualan')
        ->where('no_faktur','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data barang ke view index
        return view('penjualan.index_penjualan',['data_penjualan' => $data_penjualan]);
 
    }

    public function exportDuaExcel()
    {
         return Excel::download(new PenjualanDetailExport, 'PenjualanDetail.xlsx');
    }

      public function exportDuaPdf()
    {
        $penjualandetail = \App\PenjualanDetail::all();
        $penjualan = \App\Penjualan::all();
        $pdfdua = PDF::loadView('export.detailpdf', ['penjualandetail' => $penjualandetail, 'penjualan' => $penjualan]);
        return $pdfdua->download('detail.pdf');
    }

     public function exportIdPdf($id)
    {
        $penjualan = \App\Penjualan::find($id);
        $detailpenjualan = $penjualan->penjualandetail;
         $pdfid = PDF::loadView('export.detailpembelipdf', ['penjualan' => $penjualan, 'detailpenjualan' => $detailpenjualan]);
         return $pdfid->stream();
    }
}
