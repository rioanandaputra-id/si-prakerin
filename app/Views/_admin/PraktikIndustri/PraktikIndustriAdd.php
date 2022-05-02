<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Tambah Praktik Industri'; ?>
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

<?php 

foreach ($Mahasiswa as $m) {
    echo $m->nama_mahasiswa;
}

?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <?php if (session()->getFlashData('success')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <div class="card">
                    <form action="<?= site_url('admin/praktikindustri/create') ?>" method="POST">
                        <div class="card-body">                           
                            <div class="form-group">
                                <label for="id_perusahaan">Perusahaan Praktik Industri: <i class="text-danger">*</i></label>
                                <select class="form-control <?php if (session('errors.id_perusahaan')) : ?>is-invalid<?php endif ?>" id="id_perusahaan" name="id_perusahaan">
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($Perusahaan as $p) : ?>
                                        <option value="<?= $p->id_perusahaan ?>" <?= (old('id_perusahaan') == $p->id_perusahaan) ? 'selected' : ''; ?> ><?= $p->nama_perusahaan ?> || <?= $p->alamat_perusahaan ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?php if (session('errors.id_perusahaan')) : echo session('errors.id_perusahaan');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="id_mahasiswa">Mahasiswa Praktik Industri: <i class="text-danger">*</i></label>
                                <select class="form-control <?php if (session('errors.id_mahasiswa')) : ?>is-invalid<?php endif ?>" id="id_mahasiswa" name="id_mahasiswa">
                                    <option value="">--Pilih--</option>
                                    
                                </select>
                                <small class="text-danger">
                                    <?php if (session('errors.id_mahasiswa')) : echo session('errors.id_mahasiswa');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="nama_prodi">Waktu Awal Praktik Industri: <i class="text-danger">*</i></label>
                                <input type="date" class="form-control <?php if (session('errors.nama_prodi')) : ?>is-invalid<?php endif ?>" name="nama_prodi" placeholder="Masukan Program Studi" value="<?= old('nama_prodi'); ?>">
                                <small class="text-danger">
                                    <?php if (session('errors.nama_prodi')) : echo session('errors.nama_prodi');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="nama_alias">Waktu Awal Praktik Industri: <i class="text-danger">*</i></label>
                                <input type="date" class="form-control <?php if (session('errors.nama_alias')) : ?>is-invalid<?php endif ?>" name="nama_alias" placeholder="Masukan Program Studi" value="<?= old('nama_alias'); ?>">
                                <small class="text-danger">
                                    <?php if (session('errors.nama_alias')) : echo session('errors.nama_alias');
                                    endif ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="status_prodi">Status: <i class="text-danger">*</i></label>
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
                                    <a href="<?= site_url('admin/praktikindustri') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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