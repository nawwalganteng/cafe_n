<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        // dd($row);
        // $row['stok_id'] = null;
        // $stok = Stok::find($row['stok_id']);
        // if($stok){
        //     $row['stok_id']=$stok->id;
        // }else{
        //     $newStok = Stok::create(['stok'=>$row['nama_produk'],'qty'=>0]);
        //     $row['stok_id'] = $newStok->id;
        // }
        return new Product([  
            'nama_produk' => $row['nama_produk'],
            'harga' => $row['harga'],
            'jenis_id' => $row['jenis_id'],
            // 'stok_id' => $row['stok_id'],
            'deskripsi' => $row['deskripsi'],
            'img' => $row['img'],
        ]);
    }
    public function headingRow(): int
    {
        return 3;
    }
}
