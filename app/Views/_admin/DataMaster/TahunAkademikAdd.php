<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Tambah Tahun Akademik'; ?>
<?php $this->endSection(); ?>

<!-- =================================[[[[ AWAL KONTEN ]]]]========================================= -->
<?php $this->section('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <h5><?= $title; ?></h5>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <?= msgg(); ?>

                <div class="card">
                    <form action="<?= site_url('admin/datamaster/tahunakademik/create') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tahun_akademik">Tahun Akademik: <i class="text-danger">*</i></label>
                                <input type="text" class="form-control <?php if (session('errors.tahun_akademik')) : ?>is-invalid<?php endif ?>" name="tahun_akademik" placeholder="Masukan Tahun Akademik" value="<?= old('tahun_akademik'); ?>">
                                <small class="text-danger">
                                    <?php if (session('errors.tahun_akademik')) : echo session('errors.tahun_akademik');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="status_tahun_akademik">Status Tahun Akademik: <i class="text-danger">*</i></label>
                                <select class="form-control <?php if (session('errors.status_tahun_akademik')) : ?>is-invalid<?php endif ?>" id="status_tahun_akademik" name="status_tahun_akademik">
                                    <option value="">--Pilih--</option>
                                    <option value="Aktif" <?= (old('status_tahun_akademik') == 'Aktif') ? 'selected' : ''; ?> >Aktif</option>
                                    <option value="Tidak Aktif" <?= (old('status_tahun_akademik') == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                </select>
                                <small class="text-danger">
                                    <?php if (session('errors.status_tahun_akademik')) : echo session('errors.status_tahun_akademik');
                                    endif ?>
                                </small>
                            </div>
                            <div class="card-footer">
                                <div class="float-left">
                                    <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Tambah</button>
                                    <a href="<?= site_url('admin/datamaster/tahunakademik') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
                                </div>
                                <div class="float-right">
                                    <p class="text-bold mt-2"><i class="text-danger">*</i>) bidang harus diisi!</p>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR KONTEN ]]]]======================================= -->


<!-- =================================[[[[ AWAL CSS JS ]]]]======================================== -->
<?php $this->section('css'); ?>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->