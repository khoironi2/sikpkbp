<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <?= $this->session->flashdata('message'); ?>
            <?php foreach ($profile as $data) : ?>
            <a href="<?= base_url('admin/dashboard/update/' . $data['id']); ?>" class="btn btn-primary">Update</a>
            <div class="card mt-4">
                <div class="card-body">
                    <?= $data['description']; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>