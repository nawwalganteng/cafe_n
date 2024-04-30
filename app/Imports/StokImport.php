<?php

namespace App\Imports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stok([  
            'stok' => $row['nama'],
            'qty' => $row['qty']
        ]);
    }
    public function headingRow(): int
    {
        return 3;
    }
}
