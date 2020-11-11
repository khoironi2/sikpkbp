<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Dokumentasi</h2>
        </div>
    </div>

    <button type="button" data-toggle="modal" data-target="#dokumentasiModal" class="btn btn-primary mb-3 mt-3">Tambahkan</button>

    <?= $this->session->flashdata('message'); ?>

    <div class="row mb-5">
        <?php foreach ($dokumentasi as $result) : ?>
            <div class="col-sm-3 mt-4">
                <div class="card">
                    <img height="200" src="<?= base_url('assets/img/dokumentasi/' . $result['gambar_dokumentasi']); ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href="<?= base_url('admin/dokumentasi/edit/' . $result['id_dokumentasi']); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Data dokumentasi akan terhapus');" href="<?= base_url('admin/dokumentasi/destroy/' . $result['id_dokumentasi']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="dokumentasiModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="dokumentasiModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dokumentasiModal">Form Tambah Dokumentasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/dokumentasi'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kegiatan">Kegiatan</label>
                        <select class="form-control" id="id_kegiatan" name="id_kegiatan">
                            <?php foreach ($kegiatan as $data) : ?>
                                <option value="<?= $data['id_kegiatan']; ?>"><?= $data['nama_kegiatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gambar_dokumentasi">Gambar Dokumentasi</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_dokumentasi" name="gambar_dokumentasi" required>
                            <label class="custom-file-label" for="gambar_dokumentasi">Choose file</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="deskripsi_dokumentasi">Deskripsi Dokumentasi</label>
                        <textarea name="deskripsi_dokumentasi" id="deskripsi_dokumentasi" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
