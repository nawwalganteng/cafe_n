@extends('layout.app')
  
@section('title', 'Tambah Meja')
  
@section('contents')
    <h1 class="mb-0">Tambah</h1>
    <hr />
    <form action="{{ route('meja.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="no_meja" class="form-control" placeholder="No Meja">
                <input type="string" name="kapasitas" class="form-control" placeholder="Kapasitas">
                <input type="string" name="status" class="form-control" placeholder="Status">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        </div>
    </form>
@endsection