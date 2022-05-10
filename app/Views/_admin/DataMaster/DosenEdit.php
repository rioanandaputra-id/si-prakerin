<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Ubah Dosen'; ?>
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
                    <form action="<?= site_url('admin/datamaster/dosen/update') ?>" method="POST">
                    <input type="hidden" name="id_dosen" value="<?= $Dosen['id_dosen'] ?>">
                        <div class="card-body">
                            <p class="text-primary">Biodata Dosen:</p>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="nip_dosen">NIP Dosen <i class="text-danger">*</i></label>
                                        <input type="number" class="form-control <?php if (session('errors.nip_dosen')) : ?>is-invalid<?php endif ?>" name="nip_dosen" placeholder="Masukan NIP Dosen" value="<?= $Dosen['nip_dosen']; ?>">
                                        <small class="text-danger"><?php if (session('errors.nip_dosen')) : echo session('errors.nip_dosen');
                                                                    endif ?></small>
                                    </div>

                                    <div class="col-6">
                                        <label for="id_prodi">Program Studi <i class="text-danger">*</i></label>
                                        <select name="id_prodi" class="form-control <?php if (session('errors.id_prodi')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Program Studi--</option>
                                            <?php foreach ($Prodi as $value) : ?>
                                                <option value="<?= $value['id_prodi']; ?>" <?= ($Dosen['id_prodi'] == $value['id_prodi']) ? 'selected' : ''; ?>><?= $value['nama_prodi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?php if (session('errors.id_prodi')) : echo session('errors.id_prodi');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="row">
                                <div class="col">
                                        <label for="nama_dosen">Nama Dosen <i class="text-danger">*</i></label>
                                        <input type="text" class="form-control <?php if (session('errors.nama_dosen')) : ?>is-invalid<?php endif ?>" name="nama_dosen" placeholder="Masukan Nama Dosen" value="<?= $Dosen['nama_dosen']; ?>">
                                        <small class="text-danger"><?php if (session('errors.nama_dosen')) : echo session('errors.nama_dosen');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tmpt_lahir_dosen">Tempat Lahir Dosen</label>
                                        <input type="text" class="form-control <?php if (session('errors.tmpt_lahir_dosen')) : ?>is-invalid<?php endif ?>" name="tmpt_lahir_dosen" placeholder="Masukan Tempat Lahir Dosen" value="<?= $Dosen['tmpt_lahir_dosen']; ?>">
                                        <small class="text-danger"><?php if (session('errors.tmpt_lahir_dosen')) : echo session('errors.tmpt_lahir_dosen');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="tgl_lahir_dosen">Tgl. Lahir Dosen</label>
                                        <input type="date" class="form-control <?php if (session('errors.tgl_lahir_dosen')) : ?>is-invalid<?php endif ?>" name="tgl_lahir_dosen" placeholder="Masukan Tgl. Lahir Dosen" value="<?= $Dosen['tgl_lahir_dosen']; ?>">
                                        <small class="text-danger"><?php if (session('errors.tgl_lahir_dosen')) : echo session('errors.tgl_lahir_dosen');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="jenkel_dosen">Jenis Kelamin Dosen</label>
                                        <select name="jenkel_dosen" class="form-control <?php if (session('errors.jenkel_dosen')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Jenis Kelamin Dosen--</option>
                                            <option value="Laki-laki" <?= (old('jenkel_dosen') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?= (old('jenkel_dosen') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="no_hp_dosen">No. HP Dosen</label>
                                        <input type="number" class="form-control <?php if (session('errors.no_hp_dosen')) : ?>is-invalid<?php endif ?>" name="no_hp_dosen" placeholder="Masukan No. HP Dosen" value="<?= $Dosen['no_hp_dosen']; ?>">
                                        <small class="text-danger"><?php if (session('errors.no_hp_dosen')) : echo session('errors.no_hp_dosen');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat_dosen">Alamat Dosen</label>
                                <input type="text" class="form-control <?php if (session('errors.alamat_dosen')) : ?>is-invalid<?php endif ?>" name="alamat_dosen" placeholder="Masukan Alamat Dosen" value="<?= $Dosen['alamat_dosen']; ?>">
                                <small class="text-danger"><?php if (session('errors.alamat_dosen')) : echo session('errors.alamat_dosen');
                                                            endif ?></small>
                            </div>
                            <p class="text-primary">Akun untuk login sistem:</p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="email_dosen">Email </label>
                                        <input type="email" class="form-control <?php if (session('errors.email_dosen')) : ?>is-invalid<?php endif ?>" name="email_dosen" placeholder="Masukan email" value="<?= $Dosen['email_dosen']; ?>">
                                        <small class="text-danger"><?php if (session('errors.email_dosen')) : echo session('errors.email_dosen');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Username <i class="text-danger">*</i></label>
                                        <input type="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Masukan Username" value="<?= $Akun['username']; ?>">
                                        <small class="text-danger"><?php if (session('errors.username')) : echo session('errors.username');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="password">Password <i class="text-danger">*</i></label>
                                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Masukan Kata Sandi" >
                                        <small class="text-danger"><?php if (session('errors.password')) : echo session('errors.password_hash');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="status_akun">Status <i class="text-danger">*</i></label>
                                        <select name="status_akun" class="form-control <?php if (session('errors.status_akun')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Status--</option>
                                            <option value="Aktif" <?= ($Akun['status_akun'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                                            <option value="Tidak Aktif" <?= ($Akun['status_akun'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                        </select>
                                        <small class="text-danger"><?php if (session('errors.status_akun')) : echo session('errors.status_akun');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Ubah</button>
                                <a href="<?= site_url('admin/datamaster/dosen') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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