<?php

namespace App\Http\Controllers;

use App\Models\ProdukTitipan;
use PDOException;
use Exception;
use App\Http\Requests\ProdukTitipanRequest;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreProdukTitipanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukTitipanExport;
use App\Imports\ProdukTitipanImport;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['produk_titipan'] = ProdukTitipan::orderBy('created_at', 'DESC')->get();

            return view('produk_titipan.index', ['title' => 'ProdukTitipan'])->with($data);
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
    public function store(StoreProdukTitipanRequest $request)
    {
        try {

            ProdukTitipan::create($request->all()); //query input ke table
            return redirect('produk_titipan')->with('success', 'Data ProdukTitipan berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {

            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produk_titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produk_titipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProdukTitipanRequest  $request, ProdukTitipan $id)
    {
        try {
            // Validasi data yang dikirimkan
            $validatedData = $request->validated();

            // Update data ProdukTitipan
            $id->update($validatedData);

            return redirect('produk_titipan')->with('success', 'Update data berhasil!');
        } catch (\Exception $error) {
            // Tangani kesalahan jika terjadi
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $id)
    {
        try {
            $id->delete();
            return redirect('produk_titipan')->with(
                'success',
                'Data berhasil dihapus!'
            );
        } catch (QueryException | Exception | PDOException $error) {
            return 'haha' . $error->getMessage();$this->failResponse($error->getMessage() . $error->getCode());
        }
    }
    
    public function exportData(){
         $date = date('Y-m-d');
        return Excel::download(new ProdukTitipanExport, $date. '_paket.xlsx');
    }

    public function importData(){
        // dd(Excel::import(new ProdukTitipanImport, request()->file('import')));
        Excel::import(new ProdukTitipanImport, request()->file('import'));

        return redirect('produk_titipan')->with('success', 'Import data berhasil!');
    }
}