@extends('layout.app')
  
@section('title', 'Tambah Jenis ')
  
@section('contents')
    <h1 class="mb-0">Tambah</h1>
    <hr />
    <form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis">
            </div>
            </div>

            <div class="row mb-3">
            <div class="col">
                <input type="text" name="kategori_id" class="form-control" placeholder="ID Kategori">
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        </div>
    </form>
@endsection