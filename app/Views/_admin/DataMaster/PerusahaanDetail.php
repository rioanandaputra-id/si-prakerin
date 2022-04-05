<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Detail Perusahaan'; ?>
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
                                <table>
                                    <tr>
                                        <td>Status Perusahaan</td>
                                        <td>:</td>
                                        <td><?= $perusahaan['status_perusahaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Perusahaan</td>
                                        <td>:</td>
                                        <td><?= $perusahaan['nama_perusahaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telpon Perusahaan</td>
                                        <td>:</td>
                                        <td><?= $perusahaan['telp_perusahaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email Perusahaan</td>
                                        <td>:</td>
                                        <td><?= $perusahaan['email_perusahaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Web Perusahaan</td>
                                        <td>:</td>
                                        <td><?= $perusahaan['web_perusahaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Perusahaan</td>
                                        <td>:</td>
                                        <td><?= $perusahaan['alamat_perusahaan']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <iframe src="https://maps.google.com/maps?q=<?= $perusahaan['lat_perusahaan']; ?>,<?= $perusahaan['long_perusahaan']; ?>&hl=en&z=18&amp;output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= site_url('admin/datamaster/perusahaan/edit/?id=' . $perusahaan['id_perusahaan']); ?>" class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Ubah Data</a>
                        <a href="<?= site_url('admin/datamaster/perusahaan') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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