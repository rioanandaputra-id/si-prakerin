<?php $this->extend('/_mahasiswa/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Praktik Industri - Ajukan Perusahaan Baru'; ?>
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
                    <form action="<?= site_url('mahasiswa/praktikindustri/create') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan: <i class="text-danger">*</i></label>
                                <input type="text" class="form-control <?php if(session('errors.nama_perusahaan')) : ?>is-invalid<?php endif ?>" name="nama_perusahaan" placeholder="Masukan Nama Perusahaan" value="<?= old('nama_perusahaan'); ?>">
                                    <small class="text-danger"><?php if(session('errors.nama_perusahaan')) : echo session('errors.nama_perusahaan'); endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="alamat_perusahaan">Alamat Perusahaan: <i class="text-danger">*</i></label>
                                <input type="text" class="form-control <?php if(session('errors.alamat_perusahaan')) : ?>is-invalid<?php endif ?>" name="alamat_perusahaan" placeholder="Masukan Alamat Perusahaan" value="<?= old('alamat_perusahaan'); ?>">
                                    <small class="text-danger"><?php if(session('errors.alamat_perusahaan')) : echo session('errors.alamat_perusahaan'); endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="telp_perusahaan">Telpon Perusahaan: <i class="text-danger">*</i></label>
                                <input type="number" class="form-control <?php if(session('errors.telp_perusahaan')) : ?>is-invalid<?php endif ?>" name="telp_perusahaan" placeholder="Masukan Telpon Perusahaan" value="<?= old('telp_perusahaan'); ?>">
                                    <small class="text-danger"><?php if(session('errors.telp_perusahaan')) : echo session('errors.telp_perusahaan'); endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email_perusahaan">Email Perusahaan:</label>
                                <input type="email" class="form-control <?php if(session('errors.email_perusahaan')) : ?>is-invalid<?php endif ?>" name="email_perusahaan" placeholder="Masukan Email Perusahaan" value="<?= old('email_perusahaan'); ?>">
                                    <small class="text-danger"><?php if(session('errors.email_perusahaan')) : echo session('errors.email_perusahaan'); endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="web_perusahaan">Web Perusahaan:</label>
                                <input type="url" class="form-control <?php if(session('errors.web_perusahaan')) : ?>is-invalid<?php endif ?>" name="web_perusahaan" placeholder="Masukan Web Perusahaan" value="<?= old('web_perusahaan'); ?>">
                                    <small class="text-danger"><?php if(session('errors.web_perusahaan')) : echo session('errors.web_perusahaan'); endif ?></small>
                            </div>
                            <div class="form-group">
                                <label for="googleMap">Pin Lokasi Perusahaan Pada Maps:</label>
                                <div id="googleMap" style="width:100%;height:380px;"></div>
                                <input type="hidden" id="long_perusahaan" name="long_perusahaan" value="<?= old('long_perusahaan'); ?>">
                                <input type="hidden" id="lat_perusahaan" name="lat_perusahaan" value="<?= old('lat_perusahaan'); ?>">
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Tambah</button>
                                <a href="<?= site_url('mahasiswa/praktikindustri') ?>" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
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
        var propertiPeta = {
            center: new google.maps.LatLng(-5.4205572857990925, 105.26098815549176),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->