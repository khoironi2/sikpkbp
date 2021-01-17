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
                            <label for="tanggal">Tanggal</label>
                            <input type="number" name="hari" class="form-control" id="hari" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Bulan</label>
                            <select class="form-control" id="bulan" name="bulan">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">JUli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tahun</label>
                            <select class="form-control" id="tahun" name="tahun">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
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