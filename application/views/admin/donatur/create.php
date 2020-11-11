<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6">
            <h2>Data Donatur</h2>
        </div>
    </div>

    <div class="row mt-3 justify-content-center mb-5">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    Form Tambah Donatur
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/donatur/create'); ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>