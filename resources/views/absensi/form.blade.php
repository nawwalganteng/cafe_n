<div class="modal fade" id="formAbsensiModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Absensi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="absensi">
                        @csrf
                        <div id="method"></div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputAbsensi">Nama Karyawan</label>
                                <input type="text" class="form-control" id="namaKaryawan" value=""
                                    name="namaKaryawan">
                                <label for="exampleInputAbsensi">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggalMasuk" value=""
                                    name="tanggalMasuk">
                                <label for="exampleInputAbsensi">Waktu Masuk</label>
                                <input type="time" class="form-control" id="waktuMasuk" value=""
                                    name="waktuMasuk">
                                <div class="form-group mandatory">
                                    <label for="status" class="form-label">Pilih Status</label>
                                        <select class="form-control form-select" name="status" id="status">
                                            <option value="" selected disabled>- Pilih Status -</option>
                                            <option value="masuk">Masuk</option>
                                            <option value="cuti">Cuti</option>
                                            <option value="sakit">Sakit</option>
                                        </select>
                                </div>
                                <label for="exampleInputAbsensi">Waktu Selesai Kerja</label>
                                <input type="time" class="form-control" id="waktuKeluar" value="" name="waktuKeluar">
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