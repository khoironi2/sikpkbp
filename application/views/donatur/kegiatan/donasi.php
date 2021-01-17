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
                    <form action="<?= base_url('donatur/kegiatan/donasi/' . $kegiatan["id_kegiatan"]); ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" readonly class="form-control-plaintext" name="name" value="<?= $users['name'] ?>" id="nama">
                            <input type="text" hidden class="form-control-plaintext" name="id_users" value="<?= $users['id_users'] ?>" id="id_users">
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
                            <label for="nominal">Nominal Donasi</label>
                            <input type="text" class="form-control" name="nominal_donasi" id="nominal_donasi" required>
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Nama Kegiatan</label>
                            <input type="text" readonly class="form-control-plaintext" value="<?= $kegiatan['nama_kegiatan'] ?>" name="nama_kegiatan" id="nama_kegiatan">
                            <input type="text" hidden class="form-control-plaintext" value="<?= $kegiatan['id_kegiatan'] ?>" name="id_kegiatan" id="id_kegiatan">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"> Lanjutkan</button>
                            <!-- <a href="<?= base_url('donatur/kegiatan/rek'); ?>" class="btn btn-primary">Lanjutkan</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>