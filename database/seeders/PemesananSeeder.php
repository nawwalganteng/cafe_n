<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pemesanan;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemesanans = [
            ['tanggal'=>"2024-4-14",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-15",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-16",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-17",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-18",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-19",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-20",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-21",'total_harga'=>(random_int(1,10)*random_int(1,100))],
            ['tanggal'=>"2024-4-22",'total_harga'=>(random_int(1,10)*random_int(1,100))],
        ];

        foreach($pemesanans as $p){
            Pemesanan::create($p);
        }
            
    }
}
