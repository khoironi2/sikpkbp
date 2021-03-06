<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Jadwal Kegiatan</h2>
        </div>
    </div>

    <div class="text-center">
        <a href="<?= base_url('admin/kegiatan/create'); ?>" class="btn btn-primary mt-3 mb-3">Tambah</a>
    </div>
    <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-9">

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Dana Dibtuhkan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kegiatan as $keg) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $keg['nama_kegiatan']; ?></td>
                            <td>Rp. <?= number_format($keg['nominal_dana_kegiatan'], 0, ',', '.'); ?></td>
                            <td><?= $keg['time_pelakasanaan_kegiatan']; ?></td>
                            <td>
                                <img class="img-thumbnail" width="50" src="<?= base_url('assets/img/kegiatan/' . $keg['gambar_kegiatan']); ?>" alt="">
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if ($keg['status_kegiatan'] == "belum_aktif") { ?>
                                        <a style="color: white;" class="badge badge-danger " href="<?php echo site_url('admin/kegiatan/updateStatusW/' . $keg['id_kegiatan']) ?>">
                                            Aktifkan
                                        </a>
                                    <?php } elseif ($keg['status_kegiatan'] == "aktif") { ?>
                                        <a style="color: white;" class="badge badge-warning">
                                            Aktif
                                        </a>
                                    <?php } ?>
                                </div>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/kegiatan/edit/' . $keg['id_kegiatan']); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Data kegiatan akan terhapus');" href="<?= base_url('admin/kegiatan/destroy/' . $keg['id_kegiatan']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>