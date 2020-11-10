<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Data Donasi</h2>
        </div>
    </div>

    <div class="text-center">
        <a href="<?= base_url('admin/donasi/create'); ?>" class="btn btn-primary mt-3 mb-3">Tambah</a>
        <h4>Donasi Terkumpul : Rp. 15.000.000</h4>
    </div>

    <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-9">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Donasi Terkumpul</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>OK</td>
                        <td>
                            <a href="<?= base_url('admin/donasi/edit'); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>