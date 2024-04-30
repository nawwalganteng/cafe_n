@extends('layout.app')
  
@section('title')
  
@section('contents')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('content')</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#formProdukTitipanModal">
                    <i class="fas fa-plus"></i> Add Produk Titipan
                </button>
                <a href="{{ route('export-ProdukTitipan') }}" class="btn btn-warning">
                    <i class="fas fa-file-download"></i> Export
                </a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-export"></i> Import
                </button>
                <!--Modal -->
                @include('produk_titipan.form')
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('produk_titipan.data')
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
@push('script')
    <script>
        $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })


        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `apakah data <span style="color:red">${data}</span> akan dihapus?`,
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
  })

        $('#formProdukTitipanModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_produk = btn.data('nama_produk')
            const nama_supplier = btn.data('nama_supplier')
            const harga_jual = btn.data('harga_jual')
            const harga_beli = btn.data('harga_beli')
            const stok = btn.data('stok')
            const id = btn.data('id')
            const modal = $(this)
            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit Data Produk Titipan')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('#nama_supplier').val(nama_supplier)
                modal.find('#harga_jual').val(harga_jual)
                modal.find('#harga_beli').val(harga_beli)
                modal.find('#stok').val(stok)
                modal.find('.modal-body form').attr('action', '{{ url('produk_titipan') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Produk Titipan')
                modal.find('#nama_produk').val('')
                modal.find('#nama_supplier').val('')
                modal.find('#harga_jual').val('')
                modal.find('#harga_beli').val('')
                modal.find('#stok').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('produk_titipan') }}')
            }
        })
    </script>
@endpush