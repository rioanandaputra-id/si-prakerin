<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Praktik Industri'; ?>
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
                            <a href="<?= site_url('admin/praktikindustri/add') ?>" class="btn btn-primary btn-flat btn-sm"> <i class="fa fa-plus-circle"></i>
                                Tambah</a>
                            <button type="button" id="delete" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash"></i>
                                Hapus</button>
                            <button type="button" id="confirm" class="btn btn-warning btn-flat btn-sm text-white"> <i class="fa fa-check"></i>
                                Konfirmasi</button>
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
                                            <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
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
                                            <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
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
        columns: [{
                data: 'id_praktik_industri',
                name: 'id_praktik_industri',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' + row.id_praktik_industri + '">';
                }
            },
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
                    return '<a href="<?= site_url('admin/praktikindustri/detail/?id=') ?>' + row.id_praktik_industri + '">' + data + '</a><br>' + row.nim_mahasiswa + '<br>' + row.nama_prodi;
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
                data: 'status_praktik_industri',
                name: 'status_praktik_industri'
            },
        ],
        order: [
            [1, "desc"]
        ],
    });

    $('#reload').click(function() {
        dataTable.ajax.reload();
    });

    $('.checkbox_all').click(function() {
        if ($(this).is(':checked')) {
            $('.checkbox_item').prop('checked', true);
            $('.checkbox_all').prop('checked', true);
        } else {
            $('.checkbox_item').prop('checked', false);
            $('.checkbox_all').prop('checked', false);
        }
    });

    $('#delete').click(function() {
        var id = [];
        $('.checkbox_item:checked').each(function() {
            id.push($(this).val());
        });
        if (id.length > 0) {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                showCancelButton: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('admin/praktikindustri/delete') ?>",
                        type: "POST",
                        data: {
                            'id_praktik_industri': id
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil dihapus",
                                icon: "success",
                                button: "Tutup",
                            });
                            $('.checkbox_all').prop('checked', false);
                            dataTable.ajax.reload();
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Data gagal dihapus",
                                icon: "error",
                                button: "Tutup",
                            });
                        }
                    });
                }
            });
        } else {
            Swal.fire({
                title: "Pilih data yang ingin dihapus!",
                icon: "warning",
                button: "Tutup",
            });
        }
    });

    $('#confirm').click(function() {
        var id = [];
        $('.checkbox_item:checked').each(function() {
            id.push($(this).val());
        });
        if (id.length > 0) {
            Swal.fire({
                title: 'Konfirmasi status praktik industri',
                input: 'select',
                inputOptions: {
                    'Tidak Aktif': 'Tidak Aktif',
                    'Aktif': 'Aktif',
                },
                inputPlaceholder: '--pilih--',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value == '') {
                            resolve(
                                'Anda harus memilih status praktik industri'
                            );
                        } else {
                            resolve();
                        }
                    });
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('admin/praktikindustri/update') ?>",
                        type: "POST",
                        data: {
                            'konfirmasi': true,
                            'id_praktik_industri': id,
                            'status_praktik_industri': result.value
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil dikonfirmasi",
                                icon: "success",
                                button: "Tutup",
                            });
                            dataTable.ajax.reload();
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Data gagal dikonfirmasi",
                                icon: "error",
                                button: "Tutup",
                            });
                        }
                    });
                }
            });
        } else {
            Swal.fire({
                title: "Pilih data yang ingin dikonfirmasi!",
                icon: "warning",
                button: "Tutup",
            });
        }
    });
</script>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->