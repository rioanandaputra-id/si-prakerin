<?php $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <h5>Data Master - Dokumen</h5>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Master - Dokumen</li>
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
                            <button id="add" class="btn btn-primary btn-flat btn-sm"> <i class="fa fa-plus-circle"></i>
                                Tambah</button>
                            <button type="button" id="delete" class="btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash"></i>
                                Hapus</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover dataTable dtr-inline" style="width: 100%; font-size:smaller;">
                                <thead class="bg-success">
                                    <tr>
                                        <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                        <th>JUDUL</th>
                                        <th>FORMAT</th>
                                        <th>UKURAN</th>
                                        <th>STATUS</th>
                                        <th>DIPERBAHARUI</th>
                                    </tr>
                                </thead>

                                <tfoot class="bg-success">
                                    <tr>
                                        <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                        <th>JUDUL</th>
                                        <th>FORMAT</th>
                                        <th>UKURAN</th>
                                        <th>STATUS</th>
                                        <th>DIPERBAHARUI</th>
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
<!-- =================================================================================== -->

<?php $this->extend('_admin/_Template'); ?>

<?php $this->section('title'); ?>
Data Master - Dokumen
<?php $this->endSection(); ?>

<?php $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte-v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte-v3/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: ''
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },
            {
                data: 'judul_dokumen',
                name: 'judul_dokumen',
                render: function(data, type, row, meta) {
                    return '<a href="javascript:update(' + row.id_dokumen + ');">' + data + '</a>';
                }
            },
            {
                data: 'format_dokumen',
                name: 'format_dokumen'
            },
            {
                data: 'ukuran_dokumen',
                name: 'ukuran_dokumen'
            },
            {
                data: 'status_dokumen',
                name: 'status_dokumen'
            },
            {
                data: 'diperbarui',
                name: 'diperbarui'
            },
        ],
        order: [
            [1, "desc"]
        ],
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
                        url: "{{ url('backend/master/category_article/delete') }}",
                        type: "DELETE",
                        data: {
                            '_token': "{{ csrf_token() }}",
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
                            $('#tbcategory').DataTable().ajax.reload();
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

    $('#add').click(function() {
        Swal.fire({
            title: 'Tambah Kategori Artikel',
            input: 'text',
            inputPlaceholder: 'Nama Kategori Artikel',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tambah',
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value == '') {
                        resolve(
                            'Nama Kategori Artikel tidak boleh kosong!');
                    } else {
                        resolve();
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('backend/master/category_article/create') }}",
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'categoryy': result.value
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data berhasil ditambahkan",
                            icon: "success",
                            button: "Tutup",
                        });
                        $('#tbcategory').DataTable().ajax.reload();
                    },
                    error: function(data) {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data gagal ditambahkan",
                            icon: "error",
                            button: "Tutup",
                        });
                    }
                });
            }
        });
    });

    function update(id, categoryy) {
        Swal.fire({
            title: 'Ubah Kategori Artikel',
            input: 'text',
            inputValue: categoryy,
            inputPlaceholder: 'Nama Kategori Artikel',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ubah',
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value == '') {
                        resolve(
                            'Nama Kategori Artikel tidak boleh kosong!');
                    } else {
                        resolve();
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('backend/master/category_article/update') }}",
                    type: "PUT",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': id,
                        'categoryy': result.value
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data berhasil diubah",
                            icon: "success",
                            button: "Tutup",
                        });
                        $('#tbcategory').DataTable().ajax.reload();
                    },
                    error: function(data) {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data gagal diubah",
                            icon: "error",
                            button: "Tutup",
                        });
                    }
                });
            }
        });
    }
</script>
<?php $this->endSection(); ?>

<!-- =================================================================================== -->