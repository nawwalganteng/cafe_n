<table class="table table-compact table-stripped" id="data-member">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Masuk</th>
            <th>Waktu Masuk</th>
            <th>Status</th>
            <th>Waktu Keluar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($absensi as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->namaKaryawan }}</td>
                <td>{{ $p->tanggalMasuk }}</td>
                <td>{{ $p->waktuMasuk }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->waktuKeluar }}</td>

                <td>
                    <button class="btn btn-light" data-toggle="modal" data-target="#formAbsensiModal"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama_karyawan="{{ $p->namaKaryawan }}"
                        data-tanggal_masuk="{{ $p->tanggalMasuk }}" data-waktu_masuk="{{ $p->waktuMasuk }}"
                        data-status="{{ $p->status }}" data-waktu_keluar="{{ $p->waktuKeluar }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="absensi/{{ $p->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-light delete-data"
                            data-namaKaryawan="{{ $p->namaKaryawan }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>