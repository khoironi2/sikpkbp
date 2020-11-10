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
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>
                            <img class="img-thumbnail" width="50" src="<?= base_url('assets/img/sample/sample.jpg'); ?>" alt="">
                        </td>
                        <td>
                            <a href="" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>