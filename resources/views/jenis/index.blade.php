@extends('layout.app')
  
@section('title')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Jenis</h1>
    </div>
            <a href="{{ route('jenis.create') }}" class="btn btn-info">Tambah Jenis</a>
            <a href="{{ route('export-Jenis') }}" class="btn btn-warning">
                    <i class="fas fa-file-download"></i> Export
                </a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-excel"></i>
                    import
                </button>
                <div class="mt-3">
                    @include('jenis.modal')
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
                <th>Nama Jenis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($jenis->count() > 0)
                @foreach($jenis as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nama_jenis }}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('jenis.show', $rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('jenis.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('jenis.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Hapus?')">
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