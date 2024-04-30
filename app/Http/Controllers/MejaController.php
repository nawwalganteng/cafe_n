<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;
use App\Imports\MejaImport;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;

class MejaController extends Controller
{
    /**
     * Display a listing of the res
     */
    public function index()
    {
        $meja= Meja::orderBy('created_at', 'DESC')->get();
  
        return view('meja.index', compact('meja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMejaRequest $request)
    {
        Meja::create($request->all());
 
        return redirect()->route('meja')->with('success', 'meja tersimpan sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $meja = Meja::findOrFail($id);
  
        return view('meja.show', compact('meja'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $meja = Meja::findOrFail($id);
  
        return view('meja.edit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, string $id)
    {
        $meja = Meja::findOrFail($id);
        $meja->update($request->all());
  
        return redirect()->route('meja')->with('success', 'meja diupdate sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meja = Meja::findOrFail($id);
  
        $meja->delete();
  
        return redirect()->route('meja')->with('success', 'meja dihapus sukses');
    }

    public function exportData(){
         $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date. '_paket.xlsx');
    }

    public function importData()
{
    try {
        Excel::import(new MejaImport, request()->file('import'));
        return redirect('/meja')->with('success', 'Import data meja berhasil');
    } catch (\Exception $e) {
        return redirect('/meja')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
    }
}

}