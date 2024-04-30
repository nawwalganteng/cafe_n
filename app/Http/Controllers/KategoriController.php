<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori= Kategori::orderBy('created_at', 'DESC')->get();
  
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        Kategori::create($request->all());
 
        return redirect()->route('kategori')->with('success', 'Kategori tersimpan sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
  
        return view('kategori.show', compact('kategori'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
  
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
  
        $kategori->update($request->all());
  
        return redirect()->route('kategori')->with('success', 'kategori diupdate sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
  
        $kategori->delete();
  
        return redirect()->route('kategori')->with('success', 'kategori dihapus sukses');
    }

    public function exportData(){
         $date = date('Y-m-d');
        return Excel::download(new KategoriExport, $date. '_paket.xlsx');
    }
    public function importData()
{
    try {
        Excel::import(new KategoriImport, request()->file('import'));
        
        return redirect('/kategori')->with('success', 'Import data kategori berhasil');
    } catch (\Exception $e) {
        return redirect('/kategori')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
    }
}
}
