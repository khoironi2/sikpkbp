<div class="container ">
    <div class="row justify-content-center">
        <h1 class="text-center">Profile <?= $users["name"]; ?></h1>
    </div>
    <div class="row justify-content-center">
        <div class="row mt-4">
            <div class="col-sm-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-body">

                        <form action="<?= base_url('donatur/profile'); ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required value="<?= $users["name"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" readonly class="form-control-plaintext" id="email" name="email" required value="<?= $users["email"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="rt_users">Terakhir Login</label>
                                <input type="text" readonly class="form-control-plaintext" id="rt_users" name="rt_users" required value="<?= $users["time_login_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="rw_users">Terakhir Logout</label>
                                <input type="text" readonly class="form-control-plaintext" id="rw_users" name="rw_users" required value="<?= $users["time_logout_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat_users">Alamat</label>
                                <input type="text" class="form-control" id="alamat_users" name="alamat_users" required value="<?= $users["alamat_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="telepon_users">telepon</label>
                                <input type="text" class="form-control" id="telepon_users" name="telepon_users" required value="<?= $users["telepon_users"]; ?>">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="<?= base_url('assets/images/users/' . $users["gambar_users"]); ?>" alt="gambar user" height="70">
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="gambar_users">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" id="gambar_users" name="gambar_users" class="form-control-file">
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