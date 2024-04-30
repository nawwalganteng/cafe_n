<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use App\Http\Requests\AbsensiRequest;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['absensi'] = Absensi::orderBy('created_at', 'DESC')->get();

            return view('absensi.index', ['title' => 'Absensi'])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiRequest $request)
    {
        try {

            Absensi::create($request->all()); //query input ke table
            return redirect('absensi')->with('success', 'Data Absensi berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {

            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbsensiRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            
            // Cek apakah data dengan ID yang diberikan ada
            $absensi = Absensi::find($id);
            if (!$absensi) {
                return redirect('absensi')->with('error', 'Data absensi tidak ditemukan.');
            }
            
            $absensi->update($validatedData);
            return redirect('absensi')->with('success', 'Update data berhasil!');
        } catch (QueryException | Exception | PDOException $error) {
            \Log::error('Error saat mengupdate data absensi: ' . $error->getMessage());
            return redirect('absensi')->with('error', 'Gagal mengupdate data absensi. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi, $id)
    {
        try {
            Absensi::find($id)->delete();
            return redirect('absensi')->with(
                'success',
                'Data berhasil dihapus!'
            );
        } catch (QueryException | Exception | PDOException $error) {
            return 'haha' . $error->getMessage();$this->failResponse($error->getMessage() . $error->getCode());
        }
    }

    public function exportData(){
         $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date. '_paket.xlsx');
    }
}

