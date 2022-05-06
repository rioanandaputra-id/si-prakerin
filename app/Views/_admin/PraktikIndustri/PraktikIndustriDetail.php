<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Detail Praktik Industri'; ?>
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
                                                <td><?= $PraktikIndustri[0]->nama_mahasiswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>NPM Mahasiswa</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->nim_mahasiswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>J. Kelamin</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->jenkel_mahasiswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tgl. Lahir</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->tmpt_lahir_mahasiswa . ', ' . $PraktikIndustri[0]->tgl_lahir_mahasiswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email / No. HP</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->email_mahasiswa . ' / ' . $PraktikIndustri[0]->no_hp_mahasiswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->alamat_mahasiswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Orang Tua</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->nama_ortua; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. HP Orang Tua</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->no_hp_ortua; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Program Studi</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->nama_prodi; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Akademik</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->tahun_akademik; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Mahasiswa</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->status_akun; ?></td>
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
                                                <td><?= $PraktikIndustri[0]->nama_perusahaan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telpon Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->telp_perusahaan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->email_perusahaan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Website Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->web_perusahaan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->alamat_perusahaan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Perusahaan</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->status_perusahaan; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <div class="row mt-5">
                                            <iframe class="mt-2" src="https://maps.google.com/maps?q=<?= $PraktikIndustri[0]->lat_perusahaan; ?>,<?= $PraktikIndustri[0]->long_perusahaan; ?>&hl=en&z=18&amp;output=embed" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p class="text-primary mt-4">Data Praktik Industri</p>
                                        <table>
                                            <tr>
                                                <td>Waktu Praktik Industri</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->waktu_awal_praktik_industri . ' s.d ' . $PraktikIndustri[0]->waktu_akhir_praktik_industri; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Praktik Industri</td>
                                                <td>:</td>
                                                <td>80.23 / 100</td>
                                            </tr>
                                            <tr>
                                                <td>Pengajuan Praktik Industri</td>
                                                <td>:</td>
                                                <td><a href="">Lihat Dokumen</a></td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Praktik Industri</td>
                                                <td>:</td>
                                                <td><a href="">Lihat Dokumen</a></td>
                                            </tr>
                                            <tr>
                                                <td>Status Praktik Industri</td>
                                                <td>:</td>
                                                <td><?= $PraktikIndustri[0]->status_praktik_industri; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= site_url('admin/praktikindustri/edit/?id='.$PraktikIndustri[0]->id_praktik_industri); ?>" class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Ubah Data</a>
                        <a href="<?= site_url('admin/praktikindustri') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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