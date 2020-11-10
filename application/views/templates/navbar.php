<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url(); ?>">Profil</a>
                <a class="nav-link" href="<?= base_url('kegiatan'); ?>">Kegiatan</a>
                <a class="nav-link" href="<?= base_url('dokumentasi'); ?>">Dokumentasi</a>
                <a class="nav-link" href="<?= base_url('laporan'); ?>">Laporan Donasi</a>
                <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
            </div>
        </div>
    </div>
</nav>
<!-- END::navbar -->