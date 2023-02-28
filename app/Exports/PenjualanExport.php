<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Obat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PenjualanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::with('obat')->get();
    }

    public function map($penjualan) : array {
        return [
            $penjualan->obat->nama_obat,
            $penjualan->banyak,
            $penjualan->nama_pembeli,
            $penjualan->total
        ] ;
 
 
    }

    public function headings():array
    {
        return [
            'Nama',
            'Banyak',
            'Pembeli',
            'Total'
        ];
    }

}
