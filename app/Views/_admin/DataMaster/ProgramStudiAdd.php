<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Tambah Program Studi'; ?>
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
                    <form action="<?= site_url('admin/datamaster/prodi/create') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_prodi">Program Studi: <i class="text-danger">*</i></label>
                                <input type="text" class="form-control <?php if (session('errors.nama_prodi')) : ?>is-invalid<?php endif ?>" name="nama_prodi" placeholder="Masukan Program Studi" value="<?= old('nama_prodi'); ?>">
                                <small class="text-danger">
                                    <?php if (session('errors.nama_prodi')) : echo session('errors.nama_prodi');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="nama_alias">Nama Alias: </label>
                                <input type="text" class="form-control <?php if (session('errors.nama_alias')) : ?>is-invalid<?php endif ?>" name="nama_alias" placeholder="Masukan Program Studi" value="<?= old('nama_alias'); ?>">
                                <small class="text-danger">
                                    <?php if (session('errors.nama_alias')) : echo session('errors.nama_alias');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="status_prodi">Status Program Studi: <i class="text-danger">*</i></label>
                                <select class="form-control <?php if (session('errors.status_prodi')) : ?>is-invalid<?php endif ?>" id="status_prodi" name="status_prodi">
                                    <option value="">--Pilih--</option>
                                    <option value="Aktif" <?= (old('status_prodi') == 'Aktif') ? 'selected' : ''; ?> >Aktif</option>
                                    <option value="Tidak Aktif" <?= (old('status_prodi') == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                </select>
                                <small class="text-danger">
                                    <?php if (session('errors.status_prodi')) : echo session('errors.status_prodi');
                                    endif ?>
                                </small>
                            </div>
                            <div class="card-footer">
                                <div class="float-left">
                                    <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Tambah</button>
                                    <a href="<?= site_url('admin/datamaster/prodi') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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