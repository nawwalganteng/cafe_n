@extends('layout.app')
  
@section('title', 'Tampilan Stok')
  
@section('contents')
    <h1 class="mb-0">Detail Stok</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="stok" class="form-control" placeholder="stok" value="{{ $stok->stok }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Stok</label>
            <input type="text" name="qty" class="form-control" placeholder="qty" value="{{ $stok->qty }}" readonly>
        </div>
    </div>
@endsection