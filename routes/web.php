<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\HomeController;
use App\Models\Stok;
use App\Models\Pemesanan;
use Illuminate\Http\Request;


Route::get('home', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::get('data_chart', function(Request $request){
        $data = Pemesanan::query()->select('tanggal','total_harga');
        if($request->minDate){
            $data = $data->where('tanggal','>=',$request->minDate);
        }
        if($request->maxDate){
            $data = $data->where('tanggal','<=',$request->maxDate);
        }
        $data = $data->orderBy('tanggal')->get();
        return response()->json($data);
    });
    Route::get('dashboard', [HomeController::class, 'Home'])->name('dashboard');
    

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
        Route::get('export/Product', [ProductController::class, 'exportData'])->name('export-product');
        Route::post('product/import', [ProductController::class, 'importData'])->name('import-product');
    });

    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('create', 'create')->name('kategori.create');
        Route::post('store', 'store')->name('kategori.store');
        Route::get('show/{id}', 'show')->name('kategori.show');
        Route::get('edit/{id}', 'edit')->name('kategori.edit');
        Route::put('edit/{id}', 'update')->name('Kategori.update');
        Route::delete('destroy/{id}', 'destroy')->name('kategori.destroy');
        Route::get('export/Kategori', [KategoriController::class, 'exportData'])->name('export-Kategori');
        Route::post('kategori/import', [KategoriController::class, 'importData'])->name('import-kategori');
    });

    Route::controller(JenisController::class)->prefix('jenis')->group(function () {
        Route::get('', 'index')->name('jenis');
        Route::get('create', 'create')->name('jenis.create');
        Route::post('store', 'store')->name('jenis.store');
        Route::get('show/{id}', 'show')->name('jenis.show');
        Route::get('edit/{id}', 'edit')->name('jenis.edit');
        Route::put('edit/{id}', 'update')->name('jenis.update');
        Route::delete('destroy/{id}', 'destroy')->name('jenis.destroy');
        Route::get('export/Jenis', [JenisController::class, 'exportData'])->name('export-Jenis');
        Route::post('jenis/import', [JenisController::class, 'importData'])->name('import-jenis');
    });

    Route::controller(StokController::class)->prefix('stok')->group(function () {
        Route::get('', 'index')->name('stok');
        Route::get('create', 'create')->name('stok.create');
        Route::post('store', 'store')->name('stok.store');
        Route::get('show/{id}', 'show')->name('stok.show');
        Route::get('edit/{id}', 'edit')->name('stok.edit');
        Route::put('edit/{id}', 'update')->name('stok.update');
        Route::delete('destroy/{id}', 'destroy')->name('stok.destroy');
        Route::get('export/Stok', [StokController::class, 'exportData'])->name('export-Stok');
        Route::post('stok/import', [StokController::class, 'importData'])->name('import-stok');
    });

    Route::controller(PemesananController::class)->prefix('pemesanan')->group(function () {
        Route::get('', 'index')->name('pemesanan');
        Route::post('process-payment', 'processPayment')->name('pemesanan.store');
    });

    Route::controller(ProdukTitipanController::class)->prefix('produk_titipan')->group(function () {
        Route::get('', 'index')->name('produk_titipan');
        Route::post('', 'store')->name('produk_titipan.store');
        Route::get('create', 'create')->name('produk_titipan.create');
        Route::get('show/{id}', 'show')->name('produk_titipan.show');
        Route::get('edit/{id}', 'edit')->name('produk_titipan.edit');
        Route::patch('/{id}', 'update')->name('produk_titipan.update');
        Route::delete('/{id}', 'destroy')->name('produk_titipan.destroy');
    });

    Route::controller(AbsensiController::class)->prefix('absensi')->group(function () {
        Route::get('', 'index')->name('absensi');
        Route::post('', 'store')->name('absensi.store');
        Route::get('create', 'create')->name('absensi.create');
        Route::get('show/{id}', 'show')->name('absensi.show');
        Route::get('edit/{id}', 'edit')->name('absensi.edit');
        Route::patch('/{id}', 'update')->name('absensi.update');
        Route::delete('/{id}', 'destroy')->name('absensi.destroy');
    });

    Route::controller(MejaController::class)->prefix('meja')->group(function () {
        Route::get('', 'index')->name('meja');
        Route::post('', 'store')->name('meja.store');
        Route::get('create', 'create')->name('meja.create');
        Route::get('show/{id}', 'show')->name('meja.show');
        Route::get('edit/{id}', 'edit')->name('meja.edit');
        Route::put('/{id}', 'update')->name('meja.update');
        Route::delete('/{id}', 'destroy')->name('meja.destroy');
        Route::get('export/Meja', [MejaController::class, 'exportData'])->name('export-meja');
        Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');
    });

    Route::controller(PelangganController::class)->prefix('pelanggan')->group(function () {
        Route::get('', 'index')->name('pelanggan');
        Route::post('', 'store')->name('pelanggan.store');
        Route::get('create', 'create')->name('pelanggan.create');
        Route::get('show/{id}', 'show')->name('pelanggan.show');
        Route::get('edit/{id}', 'edit')->name('pelanggan.edit');
        Route::put('/{id}', 'update')->name('pelanggan.update');
        Route::delete('/{id}', 'destroy')->name('pelanggan.destroy');
        Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');
        Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import-pelanggan');
    });

    Route::get('export/ProdukTitipan', [ProdukTitipanController::class, 'exportData'])->name('export-ProdukTitipan');
    Route::post('ProdukTitipan/import', [ProdukTitipanController::class, 'importData'])->name('import-ProdukTitipan');

    Route::get('export/Absensi', [AbsensiController::class, 'exportData'])->name('export-Absensi');


});