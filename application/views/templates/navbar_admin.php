<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">Profil</a>
                <a class="nav-link" href="<?= base_url('admin/kegiatan'); ?>">Kegiatan</a>
                <a class="nav-link" href="<?= base_url('admin/dokumentasi'); ?>">Dokumentasi</a>
                <a class="nav-link" href="<?= base_url('admin/laporan'); ?>">Laporan Donasi</a>
                <a class="nav-link" href="<?= base_url('admin/donatur'); ?>">Data Donatur</a>
                <a class="nav-link" href="<?= base_url('admin/konfirmasi'); ?>">Data Konfirmasi</a>
                <a class="nav-link" href="<?= base_url('admin/donasi'); ?>">Data Donasi</a>
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>
<!-- END::navbar -->