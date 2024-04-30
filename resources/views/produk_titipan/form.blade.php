<div class="modal fade" id="formProdukTitipanModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Produk Titipan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="produk_titipan">
                        @csrf
                        <div id="method"></div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputProdukTitipan">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" value=""
                                    name="nama_produk">
                                <label for="exampleInputProdukTitipan">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" value=""
                                    name="nama_supplier">
                                <label for="exampleInputProdukTitipan">Harga Beli</label>
                                <input type="number" class="form-control" id="harga_beli" value=""
                                    name="harga_beli">
                                <label for="exampleInputProdukTitipan">Harga Jual</label>
                                <input type="number" class="form-control" id="harga_jual" value=""
                                    name="harga_jual">
                                <label for="exampleInputProdukTitipan">Stok</label>
                                <input type="number" class="form-control" id="stok" value="" name="stok">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

    <div class="modal fade" id="formImport" tabindex="1" role="dialog" aria-labelledby="ExampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="ExampleModalLabel">Import data paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('import-ProdukTitipan') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ProdukTitipan">File Excel</label>
                                <input type="file" name="import" id="import">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div> 