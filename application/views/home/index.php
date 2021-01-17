<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <?php foreach ($profile as $data) : ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <?= $data['description']; ?>
                    </div>
                <?php endforeach; ?>
                </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <?php foreach ($kegiatan as $data) : ?>
            <div class="col-sm-3 mt-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/kegiatan/' . $data->gambar_kegiatan) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data->nama_kegiatan; ?></h5>
                        <p class="text-muted">Dibutuhkan Dana <br><b>Rp. <?= number_format($data->nominal_dana_kegiatan, 0, ',', '.'); ?></b></p>
                        <p class="text-muted">Terkumpul <br><b>Rp. <?= number_format($data->total, 0, ',', '.'); ?></b></p>
                        <p class="text-muted"><?= $data->time_pelakasanaan_kegiatan; ?></p>
                        <div class="btn-group" role="group">
                            <?php if ($data->total <= $data->nominal_dana_kegiatan) { ?>
                                <a style="color: white;" class="btn btn-primary" href="<?php echo site_url('donatur/kegiatan/donasi/' . $data->id_kegiatan) ?>">
                                    Donasi
                                </a>
                            <?php } elseif ($data->total >= $data->nominal_dana_kegiatan) { ?>
                                <a style="color: white;" class="btn btn-warning">
                                    Donasi Terpenuhi
                                </a>
                            <?php } ?>
                        </div>
                        <!-- <a href="<?= base_url('donatur/kegiatan/donasi'); ?>" class="btn btn-primary">Donasi</a> -->
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>