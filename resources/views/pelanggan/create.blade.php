@extends('layout.app')
  
@section('title', 'Tambah Pelanggan')
  
@section('contents')
    <h1 class="mb-0">Tambah</h1>
    <hr />
    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan">
                <input type="text" name="email" class="form-control" placeholder="Email">
                <input type="number" name="no_telp" class="form-control" placeholder="No Telepon">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        </div>
    </form>
@endsection