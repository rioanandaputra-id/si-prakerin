<?php $this->extend('/_mahasiswa/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Praktik Industri - Riwayat Pengajuan'; ?>
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
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <div class="card-title p-3">
                            <button type="button" id="reload" class="btn btn-secondary btn-flat btn-sm"> <i class="fa fa-retweet"></i>
                                Segarkan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover dataTable dtr-inline" style="width: 100%; font-size:smaller;">
                                    <thead class="bg-success">
                                        <tr>
                                            <!-- <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th> -->
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>MAHASISWA</th>
                                            <th>PERUSAHAAN</th>
                                            <th>WAKTU PI</th>
                                            <th>THN. AKADEMIK</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>

                                    <tfoot class="bg-success">
                                        <tr>
                                            <!-- <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th> -->
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>MAHASISWA</th>
                                            <th>PERUSAHAAN</th>
                                            <th>WAKTU PI</th>
                                            <th>THN. AKADEMIK</th>
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
    </div>
</section>


<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR KONTEN ]]]]======================================= -->


<!-- =================================[[[[ AWAL CSS JS ]]]]======================================== -->
<?php $this->section('js'); ?>

<script>
    var dataTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '',
            type: 'GET',
        },
        columns: [
            {
                data: 'nim_mahasiswa',
                name: 'nim_mahasiswa',
                className: 'd-none',
            },
            {
                data: 'nama_prodi',
                name: 'nama_prodi',
                className: 'd-none',
            },
            {
                data: 'alamat_perusahaan',
                name: 'alamat_perusahaan',
                className: 'd-none',
            },
            {
                data: 'telp_perusahaan',
                name: 'telp_perusahaan',
                className: 'd-none',
            },
            {
                data: 'nama_mahasiswa',
                name: 'nama_mahasiswa',
                render: function(data, type, row, meta) {
                    return '<a href="<?= site_url('mahasiswa/praktikindustri/history/detail/?id=') ?>' + row.id_praktik_industri + '">' + data + '</a><br>' + row.nim_mahasiswa + '<br>' + row.nama_prodi;
                }
            },
            {
                data: 'nama_perusahaan',
                name: 'nama_perusahaan',
                render: function(data, type, row, meta) {
                    return data + '<br>' + row.alamat_perusahaan + '<br>' + row.telp_perusahaan;
                }
            },
            {
                data: 'waktu_awal_praktik_industri',
                name: 'waktu_awal_praktik_industri',
                render: function(data, type, row, meta) {
                    return data + '<br>s.d<br>' + row.waktu_akhir_praktik_industri;
                }
            },
            {
                data: 'tahun_akademik',
                name: 'tahun_akademik'
            },
            {
                data: 'status',
                name: 'status'
            },
        ],
        order: [
            [1, "desc"]
        ],
    });

    $('#reload').click(function() {
        dataTable.ajax.reload();
    });
</script>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->