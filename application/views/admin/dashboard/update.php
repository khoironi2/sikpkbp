<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/dashboard/update/' . $profile['id']); ?>" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $profile['id']; ?>">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $profile['title']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description"><?= $profile['description']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>`
        </div>
    </div>
</div>