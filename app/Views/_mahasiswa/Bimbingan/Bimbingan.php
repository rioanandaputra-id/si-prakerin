<?php $this->extend('/_mahasiswa/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Bimbingan'; ?>
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
                    <div class="card-header d-flex p-0">
                        <div class="card-title p-3">
                            <a href="<?= site_url('mahasiswa/bimbingan/add'); ?>" class="btn btn-primary btn-flat btn-sm"> <i class="fa fa-plus-circle"></i>
                                AJUKAN JUDUL</a>
                            <button type="button" id="reload" class="btn btn-secondary btn-flat btn-sm"> <i class="fa fa-retweet"></i>
                                SEGARKAN</button>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php if($syarat > 0) : ?>
                        <p class="d-inline"><i class="fa fa-check-circle text-green"></i> Selamat <strong class="text-primary"><?= session()->get('nama_lengkap'); ?></strong> memenuhi syarat untuk melakukan bimbingan!</p>
                        <br><?php else : ?>
                        <p class="d-inline"><i class="fa fa-times-circle text-red"></i> Maaf <strong class="text-primary"><?= session()->get('nama_lengkap'); ?></strong> belum memenuhi syarat untuk melakukan bimbingan!</p>
                        <?php endif; ?>

                        <?php if(!empty($dosbing)) : ?>
                        <p class="d-inline"><i class="fa fa-check-circle text-green"></i> Admin telah menetapkan <strong class="text-primary"><?= $dosbing[0]['nama_dosen']; ?></strong> sebagai dosen pembimbing anda, Silahkan ajukan judul terlebih dahulu.</p>
                        <p><i class="fa fa-check-circle text-green"></i> Mulai bimbingan dengan klik judul yang telah anda ajukan & disetujui dosen pembimbing anda.</p>
                        <?php else : ?>
                        <p><i class="fa fa-times-circle text-red"></i> Admin belum menetapkan dosen pembimbing anda, Ajukan judul setelah dosen pembimbing ditetapkan.</p>
                        <?php endif; ?>

                        <hr>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover dataTable dtr-inline" style="width: 100%; font-size:smaller;">
                                <thead class="bg-success">
                                    <tr>
                                        <th>JUDUL DIAJUKAN</th>
                                        <th>DOSEN PEMBIMBING</th>
                                        <th>TANGGAL DIAJUKAN</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>

                                <tfoot class="bg-success">
                                    <tr>
                                        <th>JUDUL DIAJUKAN</th>
                                        <th>DOSEN PEMBIMBING</th>
                                        <th>TANGGAL DIAJUKAN</th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR KONTEN ]]]]======================================= -->

<!-- =================================[[[[ AWAL CSS JS ]]]]======================================== -->
<?php $this->section('js'); ?>

<script type="text/javascript">
    var dataTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '',
            type: 'GET',
        },
        columns: [{
                data: 'judul_diajukan',
                name: 'judul_diajukan',
                render: function(data, type, row, meta) {
                    return '<a href="bimbingan/detail/?id=' + row.id_bimbingan_judul + '">' + data + '</a>';
                }
            },
            {
                data: 'nama_dosen',
                name: 'nama_dosen'
            },
            {
                data: 'tanggal_diajukan',
                name: 'tanggal_diajukan'
            },
            {
                data: 'status_bimbingan',
                name: 'status_bimbingan'
            }
        ],
        order: [
            [2, "desc"]
        ],
    });

    $('#reload').click(function() {
        dataTable.ajax.reload();
    });
</script>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->