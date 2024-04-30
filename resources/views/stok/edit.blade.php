@extends('layout.app')
  
@section('title', 'Edit Stok')
  
@section('contents')
    <h1 class="mb-0">Edit Stok</h1>
    <hr />
    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="stok" class="form-control" placeholder="Nama Produk" value="{{ $stok->stok}}">
            </div>
            </div>
    
            <div class="row">
            <div class="col mb-3">
                <label class="form-label">Stok</label>
                <input type="text" name="qty" class="form-control" placeholder="Stok" value="{{ $stok->qty}}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection