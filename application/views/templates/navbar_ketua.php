<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url('ketua/kegiatan'); ?>">Kegiatan</a>
                <a class="nav-link" href="<?= base_url('ketua/laporan'); ?>">Laporan Donasi</a>
                <a class="nav-link" href="<?= base_url('ketua/donatur'); ?>">Data Donatur</a>
                <a class="nav-link" href="<?= base_url('ketua/donasi'); ?>">Data Donasi</a>
                <li class="nav-item dropdown">
                    <?php if ($this->session->userdata('id_users') == "") { ?>
                        <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                    <?php } else { ?>
                        <a class="nav-link dropdown-toggle" href="<?= base_url('donatur/donasi') ?>" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $users['name'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    <?php } ?>
                </li>
            </div>
        </div>
    </div>
</nav>
<!-- END::navbar -->