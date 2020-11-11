<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Data Donasi</h2>
        </div>
    </div>

    <div class="text-center mb-5">
        <!-- <a href="<?= base_url('admin/donasi/create'); ?>" class="btn btn-primary mt-3 mb-3">Tambah</a> -->
        <?php $no = 1;
        foreach ($totaldonasi as $data) : ?>
            <h4>Donasi Terkumpul : Rp. <?= number_format($data->total, 0, ',', '.'); ?></h4>
        <?php endforeach ?>
    </div>

    <div class="container mb-0">
        <div class="row justify-content-center">
            <form action="<?= base_url('admin/donasi/laporan_keuangan_pdf'); ?>" method="POST" class="form-inline">
                <div class="form-group mb-2">
                    <label for="dari">Dari </label>
                    <input type="datetime-local" class="form-control ml-2" id="dari" name="keyword1">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="sampai">Sampai </label>
                    <input type="datetime-local" class="form-control ml-2" id="sampai" name="keyword2">
                </div>
                <button type="submit" class="au-btn btn-secondary m-b-20"><i class="far fa-file-pdf"></i> cetak</button>
            </form>
        </div>
    </div>


    <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-9">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Donasi Terkumpul</th>
                        <th scope="col">Total Donatur</th>
                        <!-- <th scope="col">Detail Donatur</th> -->
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($alldonasi as $data) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data->nama_kegiatan ?></td>
                            <td>Rp. <?= number_format($data->total, 0, ',', '.') ?></td>
                            <td><?= $data->totaldonatur ?></td>
                            <!-- <td><a class="badge badge-pill badge-info" data-toggle="modal" data-target="#exampleModal<?= $data->id_kegiatan ?>">Detail</a></td> -->
                            <td>
                                <?php if ($data->total <= $data->nominal_dana_kegiatan) { ?>
                                    <a style="color: white;" class="badge badge-secondary">
                                        Belum terpenuhi
                                    </a>
                                <?php } elseif ($data->total >= $data->nominal_dana_kegiatan) { ?>
                                    <a style="color: white;" class="badge badge-success">
                                        Terpenuhi
                                    </a>
                                <?php } ?>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url('admin/donasi/edit'); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td> -->
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<?php foreach ($detaildonatur as $data) : ?>
    <div class="modal fade" id="exampleModal<?= $data->id_kegiatan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $data->nama_kegiatan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $data->name ?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>