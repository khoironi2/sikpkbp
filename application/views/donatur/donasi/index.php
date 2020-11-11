<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Data Donasi</h2>
        </div>
    </div>

    <div class="text-center">
        <?php $no = 1;
        foreach ($totaldonasiku as $data) : ?>
            <h4>Total Donasiku : Rp. <?= number_format($data->total, 0, ',', '.'); ?></h4>
        <?php endforeach ?>
    </div>

    <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-9">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Donasi Terkumpul</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($donasiku as $data) : ?>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data->nama_kegiatan ?></td>
                        <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                        <td>
                            <?php if ($data->validasi_donasi == "belum_transfer") { ?>
                                <a style="color: white;" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal<?= $data->id_donasi ?>">
                                    Upload bukti Transfer
                                </a>
                            <?php } elseif ($data->validasi_donasi == "sudah_tranfer") { ?>
                                <a style="color: white;" class="badge badge-warning">
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

    <?php $no = 1;
    foreach ($donasiku as $data) : ?>
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
                        <form action="<?= base_url('donatur/donasi/update') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Unggah Bukti Tranfer Sejumlah <b> Rp. <?= number_format($data->total, 0, ',', '.'); ?></b></label>
                                <input type="file" name="bukti_donasi" class="form-control-file" id="bukti_donasi">
                                <input type="text" hidden name="id_donasi" class="form-control-file" value="<?= $data->id_donasi ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>