<?php

namespace App\Exports;

use App\PenjualanDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanDetailExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenjualanDetail::all();
    }

     public function map($penjualandetail): array
    {
        return [
            $penjualandetail->penjualan->no_faktur,
            $penjualandetail->kd_barang,
            $penjualandetail->nm_barang,
            $penjualandetail->harga_beli,
            $penjualandetail->diskon,
            $penjualandetail->qty,
            $penjualandetail->jumlah,
            
        ];
    }

      public function headings(): array
    {
        return [
            'NO. FAKTUR',
            'KODE BARANG',
            'NAMA BARANG',
            'HARGA BELI',
            'DISKON',
            'QTY',
            'JUMLAH'
        ];
    }
}
