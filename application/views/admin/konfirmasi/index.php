<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Data Konfirmasi Donasi</h2>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Bukti</th>
                    <th scope="col">Nama Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                            <img width="50" class="img-thumbnail" src="<?= base_url('assets/img/sample/sample.jpg') ?>" alt="">
                        </td>
                        <td>Otto</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>