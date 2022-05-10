<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Ubah Perusahaan'; ?>
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
                    <form action="<?= site_url('admin/datamaster/perusahaan/update') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id_perusahaan" value="<?= $perusahaan['id_perusahaan'] ?>">
                                <label for="nama_perusahaan">Nama Perusahaan: <i class="text-danger">*</i></label>
                                <input type="text" class="form-control <?php if (session('errors.nama_perusahaan')) : ?>is-invalid<?php endif ?>" name="nama_perusahaan" placeholder="Masukan Nama Perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>">
                                <small class="text-danger"><?php if (session('errors.nama_perusahaan')) : echo session('errors.nama_perusahaan');
                                                            endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="alamat_perusahaan">Alamat Perusahaan: <i class="text-danger">*</i></label>
                                <input type="text" class="form-control <?php if (session('errors.alamat_perusahaan')) : ?>is-invalid<?php endif ?>" name="alamat_perusahaan" placeholder="Masukan Alamat Perusahaan" value="<?= $perusahaan['alamat_perusahaan']; ?>">
                                <small class="text-danger"><?php if (session('errors.alamat_perusahaan')) : echo session('errors.alamat_perusahaan');
                                                            endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="telp_perusahaan">Telpon Perusahaan: <i class="text-danger">*</i></label>
                                <input type="number" class="form-control <?php if (session('errors.telp_perusahaan')) : ?>is-invalid<?php endif ?>" name="telp_perusahaan" placeholder="Masukan Telpon Perusahaan" value="<?= $perusahaan['telp_perusahaan']; ?>">
                                <small class="text-danger"><?php if (session('errors.telp_perusahaan')) : echo session('errors.telp_perusahaan');
                                                            endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email_perusahaan">Email Perusahaan:</label>
                                <input type="email" class="form-control <?php if (session('errors.email_perusahaan')) : ?>is-invalid<?php endif ?>" name="email_perusahaan" placeholder="Masukan Email Perusahaan" value="<?= $perusahaan['email_perusahaan']; ?>">
                                <small class="text-danger"><?php if (session('errors.email_perusahaan')) : echo session('errors.email_perusahaan');
                                                            endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="web_perusahaan">Web Perusahaan:</label>
                                <input type="url" class="form-control <?php if (session('errors.web_perusahaan')) : ?>is-invalid<?php endif ?>" name="web_perusahaan" placeholder="Masukan Web Perusahaan" value="<?= $perusahaan['web_perusahaan']; ?>">
                                <small class="text-danger"><?php if (session('errors.web_perusahaan')) : echo session('errors.web_perusahaan');
                                                            endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="googleMap">Pin Lokasi Perusahaan Pada Maps:</label>
                                <div id="googleMap" style="width:100%;height:380px;"></div>
                                <input type="hidden" id="long_perusahaan" name="long_perusahaan" value="<?= $perusahaan['long_perusahaan']; ?>">
                                <input type="hidden" id="lat_perusahaan" name="lat_perusahaan" value="<?= $perusahaan['lat_perusahaan']; ?>">
                            </div>

                            <div class="form-group">
                            <label for="status_perusahaan">Status Perusahaan<i class="text-danger">*</i></label>
                                        <select name="status_perusahaan" class="form-control <?php if (session('errors.status_perusahaan')) : ?>is-invalid<?php endif ?>">
                                            <option value="">--Pilih Status--</option>
                                                <option value="Aktif" <?= ($perusahaan['status_perusahaan'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                                                <option value="Tidak Aktif" <?= ($perusahaan['status_perusahaan'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                        </select>
                                        <small class="text-danger"><?php if (session('errors.status_perusahaan')) : echo session('errors.status_perusahaan');
                                                                    endif ?></small>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Ubah Data</button>
                                <a href="<?= site_url('admin/datamaster/perusahaan') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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
<script src="//maps.googleapis.com/maps/api/js"></script>
<script>
    // variabel global marker
    var marker;

    function taruhMarker(peta, posisiTitik) {
        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }
        // isi nilai koordinat ke form
        document.getElementById("lat_perusahaan").value = posisiTitik.lat();
        document.getElementById("long_perusahaan").value = posisiTitik.lng();
    }

    function initialize() {
        var long = document.getElementById("long_perusahaan").value;
        var lat = document.getElementById("lat_perusahaan").value;
        var propertiPeta = {
            center: new google.maps.LatLng(lat, long),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

        if (long != "" && lat != "") {
            var posisiTitik = new google.maps.LatLng(lat, long);
            taruhMarker(peta, posisiTitik);
        }
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->