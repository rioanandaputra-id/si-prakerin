<?php
$this->extend('_template/adminlte-v3/Master');
$this->section('menu');
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item <?= omenu('praktikindustri'); ?>">
            <a href="#" class="nav-link <?= omenu('praktikindustri'); ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Praktik Industri
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $seg = site_url('mahasiswa/praktikindustri'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Perusahaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('mahasiswa/praktikindustri/history'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Riwayat Pengajuan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa/bimbingan') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Bimbingan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa/seminar') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-window-restore"></i>
                <p>
                    Seminar
                </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa/penilaian') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                    Penilaian
                </p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa/dukumen') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-file"></i>
                <p>
                    Dokumen
                </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa/pesan') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-comments"></i>
                <p>
                    Pesan
                </p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="<?= $seg = site_url('mahasiswa/akun') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-lock"></i>
                <p>
                    Akun Saya
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('logout'); ?>" class="nav-link">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>

<?php $this->endSection(); ?>