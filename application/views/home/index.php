<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <?php foreach ($profile as $data) : ?>
            <div class="card mt-4">
                <div class="card-body">
                    <?= $data['description']; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>