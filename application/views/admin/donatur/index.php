<div class="container mt-4">
    <div class="row">
        <div class="col-sm-5">
            <h2>Data Donatur</h2>
        </div>
    </div>

    <div class="text-center">
        <a href="<?= base_url('admin/donatur/create'); ?>" class="btn btn-primary mt-3 mb-3">Tambah</a>
    </div>

    <div class="row mt-4 mb-5 justify-content-center">
        <div class="col-sm-9">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Donatur</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Hp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($donatur as $data) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $data['name']; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['telepon_users']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>