@extends('layout.app')
  
@section('title', 'Edit Jenis')
  
@section('contents')
    <h1 class="mb-0">Edit Jenis</h1>
    <hr />
    <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Jenis</label>
                <input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis" value="{{ $jenis->nama_jenis}}">
            </div>
            </div>
    
            <div class="row">
            <div class="col mb-3">
                <label class="form-label">ID Kategori</label>
                <input type="text" name="kategori_id" class="form-control" placeholder="ID Kategori" value="{{ $jenis->kategori_id}}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection