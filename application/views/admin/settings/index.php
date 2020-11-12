<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/settings/index'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= $users['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" readonly value="<?= $users['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="telepon_users">Telepon</label>
                            <input type="text" class="form-control" id="telepon_users" name="telepon_users" required value="<?= $users['telepon_users']; ?>">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img class="img-thumbnail" src="<?= base_url('assets/images/users/' . $users['gambar_users']); ?>" alt="">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_users" name="gambar_users">
                                        <label class="custom-file-label" for="gambar_users">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>