@extends('layout.app')
  
@section('title', 'Edit Kategori')
  
@section('contents')
    <h1 class="mb-0">Edit Kategori</h1>
    <hr />
    <form action="{{ route('Kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" value="{{ $kategori->nama}}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection