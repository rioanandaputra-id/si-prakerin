<?php $this->extend('/_mahasiswa/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Praktik Industri - Detail Riwayat Pengajuan'; ?>
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
            <div class="col">
                <div class="card">

                <?= msgg(); ?>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <div class="row">
                                    <div class="col">
                                        <p class="text-primary">Data Mahasiswa</p>
                                        <table>
                                            <tr>
                                                <td>Nama Mahasiswa</td>
                                                <td>:</td>
                                                <td><?= $Pi['nama_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>NPM Mahasiswa</td>
                                                <td>:</td>
                                                <td><?= $Pi['nim_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>J. Kelamin</td>
                                                <td>:</td>
                                                <td><?= $Pi['jenkel_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tgl. Lahir</td>
                                                <td>:</td>
                                                <td><?= $Pi['tmpt_lahir_mahasiswa'] . ', ' . $Pi['tgl_lahir_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email / No. HP</td>
                                                <td>:</td>
                                                <td><?= $Pi['email_mahasiswa'] . ' / ' . $Pi['no_hp_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $Pi['alamat_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Orang Tua</td>
                                                <td>:</td>
                                                <td><?= $Pi['nama_ortua']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. HP Orang Tua</td>
                                                <td>:</td>
                                                <td><?= $Pi['no_hp_ortua']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Program Studi</td>
                                                <td>:</td>
                                                <td><?= $Pi['nama_prodi']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Akademik</td>
                                                <td>:</td>
                                                <td><?= $Pi['tahun_akademik']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Mahasiswa</td>
                                                <td>:</td>
                                                <td style="color:red;"><?= $Pi['status_akun']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <div class="row mt-4">
                                            <div class="col">
                                                <div class="float-right">
                                                    <img src="<?= base_url('assets/adminlte-v3/dist/img/avatar5.png'); ?>" alt="Foto Mahasiswa" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p class="text-primary mt-4">Data Perusahaan</p>
                                        <table>
                                            <tr>
                                                <td>Nama Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $Pi['nama_perusahaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telpon Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $Pi['telp_perusahaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $Pi['email_perusahaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Website Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $Pi['web_perusahaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $Pi['alamat_perusahaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Perusahaan</td>
                                                <td>:</td>
                                                <td style="color:red;"><?= $Pi['status_perusahaan']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <div class="row mt-5">
                                            <iframe class="mt-2" src="https://maps.google.com/maps?q=<?= $Pi['lat_perusahaan']; ?>,<?= $Pi['long_perusahaan']; ?>&hl=en&z=18&amp;output=embed" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>

                                <?php if($Pi['status_perusahaan'] == 'Aktif') : ?>

                                <form action="<?= base_url('mahasiswa/praktikindustri/update'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="idPI" value="<?= $Pi['id_praktik_industri']; ?>">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-primary mt-4">Data Praktik Industri</p>
                                            <table>
                                                <tr>
                                                    <td>Waktu Praktik Industri</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php if(!empty($Pi['waktu_awal_praktik_industri']) && !empty($Pi['waktu_akhir_praktik_industri'])) : ?>
                                                            <?= $Pi['waktu_awal_praktik_industri']; ?> s.d <?= $Pi['waktu_akhir_praktik_industri']; ?>
                                                        <?php else : ?>
                                                        <input type="date" name="wktAwlPI" class=" <?php if(session('errors.wktAwlPI')) : ?>is-invalid<?php endif ?>" value="<?= old('wktAwlPI'); ?>"/> 
                                                        <small class="text-danger"><?php if(session('errors.wktAwlPI')) : echo session('errors.wktAwlPI'); endif ?></small> s.d 
                                                        <input type="date" name="wktAkrPI" class=" <?php if(session('errors.wktAkrPI')) : ?>is-invalid<?php endif ?>" value="<?= old('wktAkrPI'); ?>"/> 
                                                        <small class="text-danger"><?php if(session('errors.wktAkrPI')) : echo session('errors.wktAkrPI'); endif ?></small>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dokumen Pengajuan Praktik Industri</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php if(!empty($DokPi['path_dokumen'])) : ?>
                                                            <a href="<?= base_url($DokPi['path_dokumen']); ?>" target="_blank">Lihat Dokumen</a>
                                                        <?php else : ?>
                                                        <input type="file" name="dokPengPI" class=" <?php if(session('errors.dokPengPI')) : ?>is-invalid<?php endif ?>" value="<?= old('dokPengPI'); ?>"/> 
                                                        <small class="text-danger"><?php if(session('errors.dokPengPI')) : echo session('errors.dokPengPI'); endif ?></small>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>


                                                <?php if(date('Y-m-d') >= $Pi['waktu_akhir_praktik_industri'] && !empty($DokPi['path_dokumen'])) : ?>
                                                <tr>
                                                    <td>Nilai Praktik Industri</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php if(!empty($PiNil['nilai_praktik_industri'])) : ?>
                                                            <?= $PiNil['nilai_praktik_industri']; ?>
                                                        <?php else : ?>
                                                        <input  type="number" name="nilPI" class=" <?php if(session('errors.nilPI')) : ?>is-invalid<?php endif ?>" value="<?= old('nilPI'); ?>"/> 
                                                        <small class="text-danger"><?php if(session('errors.nilPI')) : echo session('errors.nilPI'); endif ?></small>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dokumen Nilai Praktik Industri</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php if(!empty($DokPiNil['path_dokumen'])) : ?>
                                                            <a href="<?= base_url($DokPiNil['path_dokumen']); ?>" target="_blank">Lihat Dokumen</a>
                                                        <?php else : ?>
                                                        <input  type="file" name="dokNilPI" class=" <?php if(session('errors.dokNilPI')) : ?>is-invalid<?php endif ?>" value="<?= old('dokNilPI'); ?>"/> 
                                                        <small class="text-danger"><?php if(session('errors.dokNilPI')) : echo session('errors.dokNilPI'); endif ?></small>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <tr>
                                                    <td>Status Praktik Industri</td>
                                                    <td>:</td>
                                                    <td style="color:red;"><?= $Pi['status_praktik_industri']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                <?php endif ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    
                        <?php if((empty($DokPi['path_dokumen']) && $Pi['status_perusahaan'] == 'Aktif') || ($Pi['status_perusahaan'] == 'Aktif' && empty($DokPiNil['path_dokumen']))) : ?>
                            <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Perbaharui Data</button>
                            </form>
                        <?php endif ?>

                        <?php if($Pi['status_praktik_industri'] == 'Penilaian praktik industri disetujui') : ?>
                            <a href="<?= site_url('mahasiswa/bimbingan') ?>" class="btn btn-success mr-2"><i class="fa fa-rocket"></i> Ajukan Bimbingan</a>
                        <?php endif ?>

                        <a href="<?= site_url('mahasiswa/praktikindustri/history') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>

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