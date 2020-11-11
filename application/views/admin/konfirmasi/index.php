<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Data Konfirmasi Donasi</h2>
        </div>
    </div>
    <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-9">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Bukti</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($donasi as $data) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data->name ?></td>
                            <td>Rp. <?= number_format($data->nominal_donasi, 0, ',', '.'); ?></td>
                            <td>
                                <img width="50" class="img-thumbnail" src="<?= base_url('assets/img/bukti_donasi/' . $data->bukti_donasi) ?>" alt="">
                            </td>
                            <td><?= $data->nama_kegiatan ?></td>
                            <td>
                                <?php if ($data->validasi_donasi == "belum_transfer") { ?>
                                    <a style="color: white;" class="badge badge-secondary">
                                        Belum Kirim Bukti Transfer
                                    </a>
                                <?php } elseif ($data->validasi_donasi == "sudah_tranfer") { ?>
                                    <a style="color: white;" class="badge badge-warning" data-toggle="modal" data-target="#exampleModal<?= $data->id_donasi ?>">
                                        Menunggu Konfirmasi
                                    </a>
                                <?php } elseif ($data->validasi_donasi == "terkonfirmasi") { ?>
                                    <a style="color: white;" class="badge badge-success">
                                        Diterima
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $no = 1;
foreach ($donasi as $data) : ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?= $data->id_donasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $data->nama_kegiatan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Donatur <b><?= $data->name ?></b> Berdonasi Sejumlah <b> Rp. <?= number_format($data->nominal_donasi, 0, ',', '.'); ?></b></label>
                            <img class="img-thumbnail" src="<?= base_url('assets/img/bukti_donasi/' . $data->bukti_donasi) ?>" alt="">
                            <input type="text" hidden name="id_donasi" class="form-control-file" value="<?= $data->id_donasi ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('admin/konfirmasi/updateStatusW/' . $data->id_donasi) ?>" class="btn btn-primary">Terima</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>