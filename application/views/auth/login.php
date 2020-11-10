<div class="container mt-5">
    <div class="row justify-content-center">
        <?php $errors = $this->session->flashdata('errors'); ?>

        <?php if (!empty($errors)) : ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger text-center">
                        <?php foreach ($errors as $key => $error) { ?>
                            <?php echo "$error<br>"; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

        <?php elseif ($msg = $this->session->flashdata('error_login')) : ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger text-center">
                        <?= $msg ?>
                    </div>
                </div>
            </div>

        <?php elseif ($msg = $this->session->flashdata('success_login')) : ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success text-center">
                        <?= $msg ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <a href="" data-toggle="modal" data-target="#exampleModal">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Donatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?= base_url('auth/registerForm') ?>" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Registration</h1>

                    <input name="name" type="text" class="form-control" placeholder="Nama lengkap" required autofocus>
                    <div style="margin-top:10px"></div>
                    <input name="telepon_users" type="text" class="form-control" placeholder="No Telpon" required autofocus>
                    <div style="margin-top:10px"></div>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Alamatemail@gmail.com" required autofocus>
                    <div style="margin-top:10px"></div>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <div style="margin-top:10px"></div> <input name="confrim_password" type="password" id="inputPassword" class="form-control" placeholder="Confrim Password" required>

                    <br>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>