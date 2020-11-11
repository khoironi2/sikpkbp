<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-4 text-center">
            <h2>Donasi</h2>
        </div>
    </div>

    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" readonly class="form-control-plaintext" name="name" value="<?= $users['name'] ?>" id="nama">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" readonly class="form-control-plaintext" name="email" value="<?= $users['email'] ?>" id="email">
                    </div>

                    <div class="form-group">
                        <label for="nohp">No. HP</label>
                        <input type="text" readonly class="form-control-plaintext" name="nohp" value="<?= $users['telepon_users'] ?>" id="nohp">
                    </div>

                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" class="form-control" name="nominal" id="nominal">
                    </div>

                    <div class="form-group">
                        <label for="kegiatan">Nama Kegiatan</label>
                        <input type="text" readonly class="form-control-plaintext" name="kegiatan" id="kegiatan">
                    </div>

                    <div class="form-group text-center">
                        <a href="<?= base_url('kegiatan/rek'); ?>" class="btn btn-primary">Lanjutkan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>