<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Perusahaan'; ?>
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
                            <a href="<?= site_url('admin/datamaster/perusahaan/add'); ?>" class="btn btn-primary btn-flat btn-sm"> <i class="fa fa-plus-circle"></i>
                                Tambah</a>
                            <button type="button" id="delete" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash"></i>
                                Hapus</button>
                            <button type="button" id="confirm" class="btn btn-warning btn-flat btn-sm text-white"> <i class="fa fa-check"></i>
                                Konfirmasi</button>
                            <button type="button" id="reload" class="btn btn-secondary btn-flat btn-sm"> <i class="fa fa-retweet"></i>
                                Segarkan</button>
                        </div>
                        <ul class="nav nav-pills ml-auto p-3">
                            <li class="nav-item"><a style="border-radius:0%;" class="nav-link active btn-sm" href="#tab_1" data-toggle="tab">Belum dikonfirmasi</a></li>
                            <li class="nav-item"><a style="border-radius:0%;" class="nav-link btn-sm" href="#tab_2" data-toggle="tab">Sudah dikonfirmasi</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="table-responsive">
                                    <table id="dataTableA" class="table table-bordered table-hover dataTableA dtr-inline" style="width: 100%; font-size:smaller;">
                                        <thead class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>TELPON</th>
                                                <th>EMAIL</th>
                                                <th>ALAMAT</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>

                                        <tfoot class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>TELPON</th>
                                                <th>EMAIL</th>
                                                <th>ALAMAT</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <div class="table-responsive">
                                    <table id="dataTableB" class="table table-bordered table-hover dataTableB dtr-inline" style="width: 100%; font-size:smaller;">
                                        <thead class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>TELPON</th>
                                                <th>EMAIL</th>
                                                <th>ALAMAT</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>

                                        <tfoot class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>TELPON</th>
                                                <th>EMAIL</th>
                                                <th>ALAMAT</th>
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
    </div>
</section>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR KONTEN ]]]]======================================= -->


<!-- =================================[[[[ AWAL CSS JS ]]]]======================================== -->
<?php $this->section('js'); ?>

<script type="text/javascript">
    var dataTableA = $('#dataTableA').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '',
            data: {
                status: 0
            }
        },
        columns: [{
                data: 'id_perusahaan',
                name: 'id_perusahaan',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' + row.id_perusahaan + '">';
                }
            },
            {
                data: 'nama_perusahaan',
                name: 'nama_perusahaan',
                render: function(data, type, row, meta) {
                    return '<a href="javascript:update(' + row.id_dsn + ');">' + data + '</a>';
                }
            },
            {
                data: 'telp_perusahaan',
                name: 'telp_perusahaan'
            },
            {
                data: 'email_perusahaan',
                name: 'email_perusahaan'
            },
            {
                data: 'alamat_perusahaan',
                name: 'alamat_perusahaan'
            },
            {
                data: 'status_perusahaan',
                name: 'status_perusahaan'
            }
        ],
        order: [
            [1, "desc"]
        ],
    });

    var dataTableB = $('#dataTableB').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '',
            data: {
                status: 1
            }
        },
        columns: [{
                data: 'id_perusahaan',
                name: 'id_perusahaan',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' + row.id_perusahaan + '">';
                }
            },
            {
                data: 'nama_perusahaan',
                name: 'nama_perusahaan',
                render: function(data, type, row, meta) {
                    return '<a href="javascript:update(' + row.id_dsn + ');">' + data + '</a>';
                }
            },
            {
                data: 'telp_perusahaan',
                name: 'telp_perusahaan'
            },
            {
                data: 'email_perusahaan',
                name: 'email_perusahaan'
            },
            {
                data: 'alamat_perusahaan',
                name: 'alamat_perusahaan'
            },
            {
                data: 'status_perusahaan',
                name: 'status_perusahaan'
            }
        ],
        order: [
            [1, "desc"]
        ],
    });

    $('#reload').click(function() {
        dataTableA.ajax.reload();
        dataTableB.ajax.reload();
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
                        url: "<?= site_url('admin/datamaster/perusahaan/delete') ?>",
                        type: "POST",
                        data: {
                            'checkbox_item': id
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil dihapus",
                                icon: "success",
                                button: "Tutup",
                            });
                            $('.checkbox_all').prop('checked', false);
                            dataTableB.ajax.reload();
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
                title: 'Konfirmasi status perusahaan',
                input: 'select',
                inputOptions: {
                    'Baru': 'Baru',
                    'Ditolak': 'Ditolak',
                    'Diterima': 'Diterima'
                },
                inputPlaceholder: '--pilih--',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value == '') {
                            resolve(
                                'Anda harus memilih status perusahaan'
                            );
                        } else {
                            resolve();
                        }
                    });
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('admin/datamaster/perusahaan/update') ?>",
                        type: "POST",
                        data: {
                            'konfirmasi': 1,
                            'checkbox_item': id,
                            'status': result.value
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil dikonfirmasi",
                                icon: "success",
                                button: "Tutup",
                            });
                            dataTableA.ajax.reload();
                            dataTableB.ajax.reload();
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