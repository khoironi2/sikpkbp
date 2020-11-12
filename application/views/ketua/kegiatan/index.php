<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6">
            <h2>Jadwal Kegiatan</h2>
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
                                <a style="color: white;" class="btn btn-primary">
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