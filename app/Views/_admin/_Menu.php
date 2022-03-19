<?php
if (!function_exists('cmenu')) {
    function cmenu($seg)
    {
        if (current_url() == $seg) {
            return 'active';
        } else {
            return '';
        }
    }
}
if (!function_exists('omenu')) {
    function omenu($seg)
    {
        if (strpos($_SERVER['REQUEST_URI'], $seg)) {
            return 'active menu-is-opening menu-open';
        } else {
            return '';
        }
    }
}
?>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin') ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item <?= omenu('datamaster'); ?>">
            <a href="#" class="nav-link <?= omenu('datamaster'); ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Data Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/admin'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/dosen'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/mahasiswa'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/perusahaan'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Perusahaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/tahunakademik'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tahun Akademik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/programstudi'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Program Studi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $seg = site_url('admin/datamaster/dokumen'); ?>" class="nav-link <?= cmenu($seg); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dokumen</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/praktikindustri'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-building"></i>
                <p>
                    Praktik Industri
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/bimbingan'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Bimbingan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/seminar'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-window-restore"></i>
                <p>
                    Seminar
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/penilaian'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                    Penilaian
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/pesan'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-comments"></i>
                <p>
                    Pesan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/rekap'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-download"></i>
                <p>
                    Rekap
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('admin/akun'); ?>" class="nav-link <?= cmenu($seg); ?>">
                <i class="nav-icon fa fa-lock"></i>
                <p>
                    Akun Saya
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $seg = site_url('logout'); ?>" class="nav-link">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>