<table class="table table-compact table-stripped" id="data-member">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Nama Supplier</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($produk_titipan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_supplier }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>{{ $p->stok }}</td>

                <td>
                    <button class="btn btn-light" data-toggle="modal" data-target="#formProdukTitipanModal"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}"
                        data-nama_supplier="{{ $p->nama_supplier }}" data-harga_beli="{{ $p->harga_beli }}"
                        data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="produk_titipan/{{ $p->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-light delete-data"
                            data-nama_produk="{{ $p->nama_produk }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>