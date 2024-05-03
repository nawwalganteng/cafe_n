<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('img');
            $table->double('harga');
            $table->string('deskripsi');
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('stok_id')->nullable();
            $table->foreign("jenis_id")->references('id')->on('jenis');
            $table->foreign("stok_id")->references('id')->on('stoks');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
