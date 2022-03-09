<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link p-1">
        <img src="<?= base_url('siprakerin.png'); ?>" alt="" class="brand-image mt-2" style="max-height: 35px;">
        <small class="brand-text d-block">Sistem Informasi</small>
        <span class="brand-text d-block mb-1" style="font-size: 15px;"><strong>PRAKTIK INDUSTRI</strong></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image mt-1">
                <img src="<?= base_url('assets/adminlte-v3/dist/img/avatar5.png'); ?>" class="mt-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Rio Ananda Putra</a>
                <small class="d-block">Dosen Ilmu Komputer</small>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Pencarian" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <?= $this->renderSection('menu'); ?>
    </div>

</aside>