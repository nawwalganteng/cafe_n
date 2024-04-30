@extends('layout.app')
  
@section('title', 'Tambah Kategori')
  
@section('contents')
    <h1 class="mb-0">Tambah</h1>
    <hr />
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama" class="form-control" placeholder="Nama Kategori">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        </div>
    </form>
@endsection