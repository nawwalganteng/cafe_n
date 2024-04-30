<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTitipan extends Model
{
    use HasFactory;
    protected $table = "produk_titipans";
    protected $fillable = ['nama_produk', 'nama_supplier', 'harga_jual', 'harga_beli', 'stok'];
}