<?php

namespace App\Exports;

use App\Models\ProdukTitipan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;  
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukTitipanExport;

class ProdukTitipanExport implements FromCollection, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProdukTitipan::all();
    }

    public function headings(): array
    {
        return[
            'Nama_produk',
            'Nama_supplier',
            'Harga_beli',
            'Harga_jual',
            'Stok',
            'Tanggal Input',
            'Tanggal Update'
        ];
    }
}
