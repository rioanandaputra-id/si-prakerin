<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="<?= base_url('siprakerin.png'); ?>" alt="" class="brand-image mt-1">
        <span class="brand-text font-weight" style="font-size: 25px;"><strong>SI-PRAKERIN</strong></span><br>
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