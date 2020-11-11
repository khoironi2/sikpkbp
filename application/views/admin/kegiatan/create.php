<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6">
            <h2>jadwal Kegiatan</h2>
        </div>
    </div>

    <div class="row mt-3 justify-content-center mb-5">
        <div class="col-sm-7">

            <div class="card">
                <div class="card-header">
                    form Tambah Kegiatan
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/kegiatan/create'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_kegiatan">nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal_dana_kegiatan">Dana Dibutuhkan</label>
                            <input type="text" name="nominal_dana_kegiatan" class="form-control" id="nominal_dana_kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="time_pelakasanaan_kegiatan">Tanggal Pelaksanaan</label>
                            <input type="date" name="time_pelakasanaan_kegiatan" class="form-control" id="time_pelakasanaan_kegiatan" required>
                            <div class="form-group">
                                <label for="gambar_kegiatan">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar_kegiatan" name="gambar_kegiatan" required>
                                    <label class="custom-file-label" for="gambar_kegiatan">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>