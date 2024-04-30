<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $fillable = ['id', 'tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];

    public function DetailTransaksi(){
        return $this->hasMany(DetailTransaksi::class);
    }

    public function showDetails($id)
    {
        $pemesanan = DetailTransaksi::find($id);
        return view('DetailTransaksi', compact('DetailTransaksi'));
    }
}
