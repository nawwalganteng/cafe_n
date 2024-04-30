@extends('layout.app')
  
@section('title')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Meja</h1>
    </div>
            <a href="{{ route('meja.create') }}" class="btn btn-info">Tambah Meja</a>
            <a href="{{ route('export-meja') }}" class="btn btn-warning">
                    <i class="fas fa-file-download"></i> Export
                </a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-excel"></i>
                    import
                </button>
                <div class="mt-3">
                    @include('meja.modal')
                </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-info">
            <tr>
                <th>No</th>
                <th>No Meja</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($meja->count() > 0)
                @foreach($meja as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->no_meja }}</td>
                        <td class="align-middle">{{ $rs->kapasitas }}</td>
                        <td class="align-middle">{{ $rs->status }}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('meja.show', $rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('meja.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('meja.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">NONE</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection