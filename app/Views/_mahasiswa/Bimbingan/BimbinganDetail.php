<?php $this->extend('/_mahasiswa/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Bimbingan - Ajukan Judul'; ?>
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
                        <div class="card-body">

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Tambah</button>
                            <a href="<?= site_url('mahasiswa/bimbingan') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
                        </div>
                        <div class="float-right">
                            <p class="text-bold mt-2"><i class="text-danger">*</i>) bidang harus diisi!</p>
                        </div>
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