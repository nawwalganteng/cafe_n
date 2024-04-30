<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JenisExport;
use App\Imports\JenisImport;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;

class JenisController extends Controller
{
    /**  
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis= Jenis::orderBy('created_at', 'DESC')->get();
  
        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());
 
        return redirect()->route('jenis')->with('success', 'Jenis tersimpan sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis = Jenis::findOrFail($id);
  
        return view('jenis.show', compact('jenis'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = Jenis::findOrFail($id);
  
        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, string $id)
    {
        $jenis = Jenis::findOrFail($id);
  
        $jenis->update($request->all());
  
        return redirect()->route('jenis')->with('success', 'Jenis diupdate sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis= Jenis::findOrFail($id);
  
        $jenis->delete();
  
        return redirect()->route('jenis')->with('success', 'Jenis dihapus sukses');
    }

    public function exportData(){
         $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date. '_paket.xlsx');
    }
    public function importData()
{
    try {
        Excel::import(new JenisImport, request()->file('import'));
        
        return redirect('/jenis')->with('success', 'Import data jenis berhasil');
    } catch (\Exception $e) {
        return redirect('/jenis')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
    }
}
}
