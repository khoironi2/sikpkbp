<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6">
            <h2>Ubah Dokumentasi</h2>
        </div>
    </div>

    <div class="row mt-3 justify-content-center mb-5">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    Form Ubah Dokumentasi
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/dokumentasi/edit/' . $dokumentasi['id_dokumentasi']); ?>" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" id="id" value="<?= $dokumentasi['id_dokumentasi']; ?>">
                        
                        <div class="form-group">
                            <label for="id_kegiatan">Kegiatan</label>
                            <select class="form-control" id="id_kegiatan" name="id_kegiatan">
                                <?php foreach ($kegiatan as $data) : ?>
                                    <option value="<?= $data['id_kegiatan']; ?>"><?= $data['nama_kegiatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img class="img-thumbnail" src="<?= base_url('assets/img/dokumentasi/' . $dokumentasi['gambar_dokumentasi']); ?>" alt="">
                                </div>
                                <div class="col-sm-9">
                                    <label for="gambar_dokumentasi">Gambar Dokumentasi</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_dokumentasi" name="gambar_dokumentasi" required>
                                        <label class="custom-file-label" for="gambar_dokumentasi">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi_dokumentasi">Deskripsi Dokumentasi</label>
                            <textarea name="deskripsi_dokumentasi" id="deskripsi_dokumentasi" class="form-control" required><?= $dokumentasi['deskripsi_dokumentasi']; ?></textarea>
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>