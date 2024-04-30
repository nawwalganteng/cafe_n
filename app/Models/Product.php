<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table = 'menu';
    // protected $fillable = ['name'];

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'jenis_id',
        'stok_id',
        'img',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
