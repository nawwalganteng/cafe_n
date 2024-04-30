@extends('layout.app')
  
@section('title', 'Edit Pelanggan')
  
@section('contents')
    <h1 class="mb-0">Edit Pelanggan</h1>
    <hr />
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="{{ $pelanggan->nama_pelanggan}}">
            </div>
                        <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $pelanggan->email}}">
            </div>
                        <div class="col mb-3">
                <label class="form-label">No Telepon</label>
                <input type="text" name="no_telp" class="form-control" placeholder="No Telepon" value="{{ $pelanggan->no_telp}}">
            </div>

            <div class="col mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $pelanggan->alamat}}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection