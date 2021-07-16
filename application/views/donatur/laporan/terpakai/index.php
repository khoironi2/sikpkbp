<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6">
            <h2>Laporan Donasi Terpakai</h2>
        </div>
    </div>

    <!-- <a href="<?= base_url('admin/Laporan_donasi_terpakai/create'); ?>" class="btn btn-primary mb-3 mt-3">Tambahkan</a> -->

    <?= $this->session->flashdata('message'); ?>

    <div class="row mb-5">
        <?php foreach ($laporan as $data) : ?>
            <!-- <div class="col-sm-2 mt-4">
                <img class="img-thumbnail" src="<?= base_url('assets/img/sample/image-file.png') ?>" alt="">
                <h5 class="mt-2">
                    <a target="_blank" href="<?= base_url('assets/laporan/' . $data['file_laporan_donasi_terpakai']); ?>" style="text-decoration: none;" class="text-dark"><?= $data['nama_file']; ?></a>
                </h5>
            </div> -->

            <div class="col-sm-3 mt-4">
                <div class="card">
                    <img height="200" src="<?= base_url('assets/img/sample/image-file.png') ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h4>
                            <a target="_blank" href="<?= base_url('assets/laporan/terpakai/' . $data['file_laporan_donasi_terpakai']); ?>" style="text-decoration: none;" class="text-dark"><?= $data['nama_file']; ?></a>
                        </h4>
                        <!-- <a onclick="return confirm('Data laporan akan terhapus');" href="<?= base_url('admin/laporan_donasi_terpakai/destroy/' . $data['id_laporan_donasi_terpakai']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>