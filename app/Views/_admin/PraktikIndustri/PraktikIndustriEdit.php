<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Ubah Praktik Industri'; ?>
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

                <?php if (session()->getFlashData('success')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('admin/praktikindustri/update') ?>" method="POST">
                            <input type="hidden" name="id_praktik_industri" value="<?= $PraktikIndustri['id_praktik_industri']; ?>">
                                <div class="form-group">
                                    <label for="id_perusahaan">Perusahaan Praktik Industri: <i class="text-danger">*</i></label>
                                    <select class="form-control <?php if (session('errors.id_perusahaan')) : ?>is-invalid<?php endif ?>" id="id_perusahaan" name="id_perusahaan">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($Perusahaan as $p) : ?>
                                            <option value="<?= $p->id_perusahaan ?>" <?= ($PraktikIndustri['id_perusahaan'] == $p->id_perusahaan) ? 'selected' : ''; ?>><?= $p->nama_perusahaan ?> || <?= $p->alamat_perusahaan ?></option>
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
                                        <?php foreach ($Mahasiswa as $m) : ?>
                                            <option value="<?= $m->id_mahasiswa ?>" <?= ($PraktikIndustri['id_mahasiswa'] == $m->id_mahasiswa) ? 'selected' : ''; ?>><?= $m->nama_mahasiswa ?> || <?= $m->nim_mahasiswa ?> || <?= $m->nama_prodi ?> || <?= $m->tahun_akademik ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?php if (session('errors.id_mahasiswa')) : echo session('errors.id_mahasiswa');
                                        endif ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_awal_praktik_industri">Waktu Awal Praktik Industri: <i class="text-danger">*</i></label>
                                    <input type="date" class="form-control <?php if (session('errors.waktu_awal_praktik_industri')) : ?>is-invalid<?php endif ?>" name="waktu_awal_praktik_industri" placeholder="Masukan Program Studi" value="<?= $PraktikIndustri['waktu_awal_praktik_industri']; ?>">
                                    <small class="text-danger">
                                        <?php if (session('errors.waktu_awal_praktik_industri')) : echo session('errors.waktu_awal_praktik_industri');
                                        endif ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_akhir_praktik_industri">Waktu Awal Praktik Industri: <i class="text-danger">*</i></label>
                                    <input type="date" class="form-control <?php if (session('errors.waktu_akhir_praktik_industri')) : ?>is-invalid<?php endif ?>" name="waktu_akhir_praktik_industri" placeholder="Masukan Program Studi" value="<?= $PraktikIndustri['waktu_akhir_praktik_industri']; ?>">
                                    <small class="text-danger">
                                        <?php if (session('errors.waktu_akhir_praktik_industri')) : echo session('errors.waktu_akhir_praktik_industri');
                                        endif ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="status_praktik_industri">Status: <i class="text-danger">*</i></label>
                                    <select class="form-control <?php if (session('errors.status_praktik_industri')) : ?>is-invalid<?php endif ?>" id="status_praktik_industri" name="status_praktik_industri">
                                        <option value="">--Pilih--</option>
                                        <option value="Aktif" <?= ($PraktikIndustri['status_praktik_industri'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?= ($PraktikIndustri['status_praktik_industri'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                    </select>
                                    <small class="text-danger">
                                        <?php if (session('errors.status_praktik_industri')) : echo session('errors.status_praktik_industri');
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