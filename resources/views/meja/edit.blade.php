@extends('layout.app')
  
@section('title', 'Edit Meja')
  
@section('contents')
    <h1 class="mb-0">Edit Meja</h1>
    <hr />
    <form action="{{ route('meja.update', $meja->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">No Meja</label>
                <input type="text" name="no_meja" class="form-control" placeholder="Nama Meja" value="{{ $meja->no_meja}}">
            </div>
                        <div class="col mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="text" name="kapasitas" class="form-control" placeholder="Nama Meja" value="{{ $meja->kapasitas}}">
            </div>
                        <div class="col mb-3">
                <label class="form-label">Status</label>
                <input type="text" name="status" class="form-control" placeholder="Nama Meja" value="{{ $meja->status}}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
            </div>
        </div>
    </form>
@endsection