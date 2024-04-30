<?php

namespace App\Imports;

use App\Models\ProdukTitipan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukTitipanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProdukTitipan([  
            'nama_produk' => $row['nama_produk'],
            'nama_supplier' => $row['nama_supplier'],
            'harga_jual' => $row['harga_jual'],
            'harga_beli' => $row['harga_beli'],
            'stok' => $row['stok']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
