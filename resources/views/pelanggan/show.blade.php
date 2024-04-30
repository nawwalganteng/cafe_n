@extends('layout.app')
  
@section('title', 'Tampilan Product')
  
@section('contents')
    <h1 class="mb-0">Detail Pelanggan</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <!-- <input type="text" name="nama" class="form-control" placeholder="nama" value="{{ $pelanggan->nama }}" readonly> -->
            <input type="text" name="nama_pelanggan" class="form-control" placeholder="nama" value="{{ $pelanggan->nama_pelanggan }}" readonly>
            <input type="text" name="email" class="form-control" placeholder="nama" value="{{$pelanggan->email }}" readonly>
            <input type="text" name="no_telp" class="form-control" placeholder="nama" value="{{ $pelanggan->no_telp }}" readonly>
            <input type="text" name="alamat" class="form-control" placeholder="nama" value="{{ $pelanggan->alamat }}" readonly>
        </div>
    </div>
@endsection