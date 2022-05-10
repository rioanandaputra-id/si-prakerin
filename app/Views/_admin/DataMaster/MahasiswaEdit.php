<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Ubah Mahasiswa'; ?>
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
                    <form action="<?= site_url('admin/datamaster/mahasiswa/update') ?>" method="POST">
                    <input type="hidden" name="id_mahasiswa" value="<?= $Mahasiswa['id_mahasiswa'] ?>">
                        <div class="card-body">
                            <p class="text-primary">Biodata mahasiswa:</p>
                            <div class="form-group mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_tahun_akademik">Tahun Akademik <i class="text-danger">*</i></label>
                                        <select name="id_tahun_akademik" class="form-control <?php if (session('errors.id_tahun_akademik')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Tahun Akademik--</option>
                                            <?php foreach ($TahunAkademik as $value) : ?>
                                                <option value="<?= $value['id_tahun_akademik']; ?>" <?= ($Mahasiswa['id_tahun_akademik'] == $value['id_tahun_akademik']) ? 'selected' : ''; ?>><?= $value['tahun_akademik']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?php if (session('errors.id_tahun_akademik')) : echo session('errors.id_tahun_akademik');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_prodi">Program Studi <i class="text-danger">*</i></label>
                                        <select name="id_prodi" class="form-control <?php if (session('errors.id_prodi')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Program Studi--</option>
                                            <?php foreach ($Prodi as $value) : ?>
                                                <option value="<?= $value['id_prodi']; ?>" <?= ($Mahasiswa['id_prodi'] == $value['id_prodi']) ? 'selected' : ''; ?>><?= $value['nama_prodi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?php if (session('errors.id_prodi')) : echo session('errors.id_prodi');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="nim_mahasiswa">NPM Mahasiswa <i class="text-danger">*</i></label>
                                        <input type="number" class="form-control <?php if (session('errors.nim_mahasiswa')) : ?>is-invalid<?php endif ?>" name="nim_mahasiswa" placeholder="Masukan NPM Mahasiswa" value="<?= $Mahasiswa['nim_mahasiswa']; ?>">
                                        <small class="text-danger"><?php if (session('errors.nim_mahasiswa')) : echo session('errors.nim_mahasiswa');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="nama_mahasiswa">Nama Mahasiswa <i class="text-danger">*</i></label>
                                        <input type="text" class="form-control <?php if (session('errors.nama_mahasiswa')) : ?>is-invalid<?php endif ?>" name="nama_mahasiswa" placeholder="Masukan Nama Mahasiswa" value="<?= $Mahasiswa['nama_mahasiswa']; ?>">
                                        <small class="text-danger"><?php if (session('errors.nama_mahasiswa')) : echo session('errors.nama_mahasiswa');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tmpt_lahir_mahasiswa">Tempat Lahir Mahasiswa</label>
                                        <input type="text" class="form-control <?php if (session('errors.tmpt_lahir_mahasiswa')) : ?>is-invalid<?php endif ?>" name="tmpt_lahir_mahasiswa" placeholder="Masukan Tempat Lahir Mahasiswa" value="<?= $Mahasiswa['tmpt_lahir_mahasiswa']; ?>">
                                        <small class="text-danger"><?php if (session('errors.tmpt_lahir_mahasiswa')) : echo session('errors.tmpt_lahir_mahasiswa');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="tgl_lahir_mahasiswa">Tgl. Lahir Mahasiswa</label>
                                        <input type="date" class="form-control <?php if (session('errors.tgl_lahir_mahasiswa')) : ?>is-invalid<?php endif ?>" name="tgl_lahir_mahasiswa" placeholder="Masukan Tgl. Lahir Mahasiswa" value="<?= $Mahasiswa['tgl_lahir_mahasiswa']; ?>">
                                        <small class="text-danger"><?php if (session('errors.tgl_lahir_mahasiswa')) : echo session('errors.tgl_lahir_mahasiswa');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="jenkel_mahasiswa">Jenis Kelamin Mahasiswa</label>
                                        <select name="jenkel_mahasiswa" class="form-control <?php if (session('errors.jenkel_mahasiswa')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Jenis Kelamin Mahasiswa--</option>
                                                <option value="Laki-laki" <?= ($Mahasiswa['jenkel_mahasiswa'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                <option value="Perempuan" <?= ($Mahasiswa['jenkel_mahasiswa'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="no_hp_mahasiswa">No. HP Mahasiswa</label>
                                        <input type="number" class="form-control <?php if (session('errors.no_hp_mahasiswa')) : ?>is-invalid<?php endif ?>" name="no_hp_mahasiswa" placeholder="Masukan No. HP Mahasiwa" value="<?= $Mahasiswa['no_hp_mahasiswa']; ?>">
                                        <small class="text-danger"><?php if (session('errors.no_hp_mahasiswa')) : echo session('errors.no_hp_mahasiswa');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat_mahasiswa">Alamat Mahasiswa</label>
                                <input type="text" class="form-control <?php if (session('errors.alamat_mahasiswa')) : ?>is-invalid<?php endif ?>" name="alamat_mahasiswa" placeholder="Masukan Alamat Mahasiswa" value="<?= $Mahasiswa['alamat_mahasiswa']; ?>">
                                <small class="text-danger"><?php if (session('errors.alamat_mahasiswa')) : echo session('errors.alamat_mahasiswa');
                                                            endif ?></small>
                            </div>
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="nama_ortua">Nama Orang Tua</label>
                                        <input type="text" class="form-control <?php if (session('errors.nama_ortua')) : ?>is-invalid<?php endif ?>" name="nama_ortua" placeholder="Masukan Orang Tua" value="<?= $Mahasiswa['nama_ortua']; ?>">
                                        <small class="text-danger"><?php if (session('errors.nama_ortua')) : echo session('errors.nama_ortua');
                                                                    endif ?></small>
                                    </div>
                                    <div class="col-6">
                                        <label for="no_hp_ortua">No. HP Orang Tua</label>
                                        <input type="number" class="form-control <?php if (session('errors.no_hp_ortua')) : ?>is-invalid<?php endif ?>" name="no_hp_ortua" placeholder="Masukan No. HP Orang Tua" value="<?= $Mahasiswa['no_hp_ortua']; ?>">
                                        <small class="text-danger"><?php if (session('errors.no_hp_ortua')) : echo session('errors.no_hp_ortua');
                                                                    endif ?></small>
                                    </div>
                                </div>
                            </div>
                            <p class="text-primary">Akun untuk login sistem:</p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="email_mahasiswa">Email </label>
                                        <input type="email" class="form-control <?php if (session('errors.email_mahasiswa')) : ?>is-invalid<?php endif ?>" name="email_mahasiswa" placeholder="Masukan Email" value="<?= $Mahasiswa['email_mahasiswa']; ?>">
                                        <small class="text-danger"><?php if (session('errors.email_mahasiswa')) : echo session('errors.email_mahasiswa');
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
                                        <label for="password">Password </label>
                                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Masukan Kata Sandi" >
                                        <small class="text-danger"><?php if (session('errors.password')) : echo session('errors.password');
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
                                <a href="<?= site_url('admin/datamaster/mahasiswa') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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