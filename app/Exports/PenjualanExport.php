<?php

namespace App\Exports;

use App\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::all();
    }

    public function map($penjualan): array
    {
        return [
            $penjualan->no_faktur,
            $penjualan->tgl_faktur,
            $penjualan->nama_konsumen,
            $penjualan->harga_total,
            $penjualan->ttl_hpp,
            $penjualan->laba,
        ];
    }

     public function headings(): array
    {
        return [
            'NO. FAKTUR',
            'TGL. FAKTUR',
            'NAMA KONSUMEN',
            'TOTAL',
            'HPP',
            'LABA'
        ];
    }
}
