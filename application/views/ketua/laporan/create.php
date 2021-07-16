<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6">
            <h2>Laporan Donasi</h2>
        </div>
    </div>

    <div class="row mt-3 justify-content-center mb-5">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    Laporan Kegiatan
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/laporan/create'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_file">Nama File</label>
                            <input name="nama_file" id="nama_file" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kegiatan">Kegiatan</label>
                            <select class="form-control" id="id_kegiatan" name="id_kegiatan">
                                <?php foreach ($kegiatan as $data) : ?>
                                    <option value="<?= $data['id_kegiatan']; ?>"><?= $data['nama_kegiatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file_laporan_donasi">File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_laporan_donasi" name="file_laporan_donasi">
                                <label class="custom-file-label" for="file_laporan_donasi">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_laporan_donasi">Deskripsi</label>
                            <textarea name="deskripsi_laporan_donasi" id="deskripsi_laporan_donasi" class="form-control" required></textarea>
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