<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;
use App\Imports\StokImport;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;

Class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok= Stok::orderBy('created_at', 'DESC')->get();
  
        return view('stok.index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stok.create');
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStokRequest $request)
    {
        Stok::create($request->all());
 
        return redirect()->route('stok')->with('success', 'Stok tersimpan sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stok = Stok    ::findOrFail($id);
  
        return view('stok.show', compact('stok'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stok = Stok::findOrFail($id);
  
        return view('stok.edit', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, string $id)
    {
        $stok = Stok::findOrFail($id);
  
        $stok->update($request->all());
  
        return redirect()->route('stok')->with('success', 'Stok diupdate sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stok= Stok::findOrFail($id);
  
        $stok->delete();
  
        return redirect()->route('stok')->with('success', 'Stok dihapus sukses');
    }

    public function exportData(){
         $date = date('Y-m-d');
        return Excel::download(new StokExport, $date. '_paket.xlsx');
    }
    public function importData()
{
    try {
        Excel::import(new StokImport, request()->file('import'));
        return redirect('/stok')->with('success', 'Import data stok berhasil');
    } catch (\Exception $e) {
        return redirect('/stok')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
    }
}
}
