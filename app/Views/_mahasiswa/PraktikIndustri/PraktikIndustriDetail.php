<?php $this->extend('/_mahasiswa/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Praktik Industri - Detail Perusahaan'; ?>
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
            <?= msgg(); ?>
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
                        <button onclick="selected(<?= $perusahaan['id_perusahaan'] ?>)" class="btn btn-primary mr-2"><i class="fa fa-hand-pointer"></i> Pilih Perusahaan</button>
                        <a href="<?= site_url('mahasiswa/praktikindustri') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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
<script>
    function selected(id) {
        Swal.fire({
            title: "Konfirmasi!",
            text: "Apakah anda yakin Memilih perusahaan ini sebagai penempatan praktik industri anda ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: "<?= site_url('mahasiswa/praktikindustri/create') ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id_perusahaan: id
                    },
                    success: function(data) {
                        if (data.status === true) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: data.msg,
                                icon: "success",
                                confirmButtonText: "Oke"
                            }).then(function() {
                                window.location.href = "<?= site_url('mahasiswa/praktikindustri/history/detail?id=') ?>" + data.id;
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: data.msg,
                                icon: "error",
                                confirmButtonText: "Oke"
                            }).then(function() {
                                window.location.href = "<?= site_url('mahasiswa/praktikindustri/history') ?>";
                            });
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Perusahaan gagal dipilih!",
                            icon: "error",
                            confirmButtonText: "Oke"
                        });
                    }
                });
            }
        });
    }
</script>
<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->