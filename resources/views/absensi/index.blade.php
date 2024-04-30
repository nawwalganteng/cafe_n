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
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#formAbsensiModal">
                    <i class="fas fa-plus"></i> Add Karyawan
                </button>
                <a href="{{ route('export-Absensi') }}" class="btn btn-warning">
                    <i class="fas fa-file-download"></i> Export
                </a>
                <!--Modal -->
                @include('absensi.form')
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('absensi.data')
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

        $('#formAbsensiModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const namaKaryawan = btn.data('nama_karyawan')
            const tanggalMasuk = btn.data('tanggal_masuk')
            const waktuMasuk = btn.data('waktu_masuk')
            const status = btn.data('status')
            const waktuKeluar = btn.data('waktu_keluar')
            const id = btn.data('id')
            const modal = $(this)
            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit Data Absensi')
                modal.find('#namaKaryawan').val(namaKaryawan)
                modal.find('#tanggalMasuk').val(tanggalMasuk)
                modal.find('#waktuMasuk').val(waktuMasuk)
                modal.find('#status').val(status)
                modal.find('#waktuKeluar').val(waktuKeluar)
                modal.find('.modal-body form').attr('action', '{{ url('absensi') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Absensi')
                modal.find('#namaKaryawan').val('')
                modal.find('#tanggalMasuk').val('')
                modal.find('#waktuMasuk').val('')
                modal.find('#status').val('')
                modal.find('#waktuKeluar').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('absensi') }}')
            }
        })
    </script>
@endpush