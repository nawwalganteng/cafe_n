<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk_titipans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 255);
            $table->string('nama_supplier', 255);
            $table->string('harga_jual');
            $table->string('harga_beli');
            $table->string('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_titipans');
    }
};
