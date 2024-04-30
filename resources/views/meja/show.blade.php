@extends('layout.app')
  
@section('title', 'Tampilan Product')
  
@section('contents')
    <h1 class="mb-0">Detail Meja</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama Meja</label>
            <!-- <input type="text" name="nama" class="form-control" placeholder="nama" value="{{ $meja->nama }}" readonly> -->
            <input type="text" name="no_meja" class="form-control" placeholder="nama" value="{{ $meja->no_meja }}" readonly>
            <input type="text" name="kapasitas" class="form-control" placeholder="nama" value="{{$meja->kapasitas }}" readonly>
            <input type="text" name="status" class="form-control" placeholder="nama" value="{{ $meja->status }}" readonly>
        </div>
    </div>
@endsection