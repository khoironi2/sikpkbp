<div class="container mt-4">
    <div class="row justify-content-center">
        <h1 class="text-center">Profile <?= $users["name"]; ?></h1>
    </div>
    <div class="row justify-content-center">
        <div class="row mt-4 justify-content-center">
            <div class="col-sm-8">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-body">

                        <form action="<?= base_url('admin/profile'); ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required value="<?= $users["name"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" readonly value="<?= $users["email"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="time_login_users">Terakhir Login</label>
                                <input type="text" readonly class="form-control" id="time_login_users" name="time_login_users" required value="<?= $users["time_login_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="time_logout_users">Terakhir Logout</label>
                                <input type="text" readonly class="form-control" id="time_logout_users" name="time_logout_users" required value="<?= $users["time_logout_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="telepon_users">telepon</label>
                                <input type="text" class="form-control" id="telepon_users" name="telepon_users" value="<?= $users["telepon_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img class="img-thumbnail" src="<?= base_url('assets/images/users/' . $users["gambar_users"]); ?>">
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="gambar_users">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" id="gambar_users" name="gambar_users" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>