<?php $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <h5>Data Master - Mahasiswa</h5>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Master - Mahasiswa</li>
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
                            <button type="button" id="delete" class="btn btn-warning btn-flat btn-sm"> <i class="fa fa-check"></i>
                                Validasi</button>
                        </div>
                        <ul class="nav nav-pills ml-auto p-3">
                            <li class="nav-item"><a style="border-radius:0%;" class="nav-link btn-sm" href="#tab_1" data-toggle="tab">Belum Validasi</a></li>
                            <li class="nav-item"><a style="border-radius:0%;" class="nav-link active btn-sm" href="#tab_2" data-toggle="tab">Sudah Validasi</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="tab_1">
                                <div class="table-responsive">
                                    <table id="dataTableA" class="table table-bordered table-hover dataTableA dtr-inline" style="width: 100%; font-size:smaller;">
                                        <thead class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>NPM</th>
                                                <th>JENKEL</th>
                                                <th>PRODI</th>
                                                <th>THN. AKADEMIK</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>

                                        <tfoot class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>NPM</th>
                                                <th>JENKEL</th>
                                                <th>PRODI</th>
                                                <th>THN. AKADEMIK</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane active" id="tab_2">
                                <div class="table-responsive">
                                    <table id="dataTableB" class="table table-bordered table-hover dataTableB dtr-inline" style="width: 100%; font-size:smaller;">
                                        <thead class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>NPM</th>
                                                <th>JENKEL</th>
                                                <th>PRODI</th>
                                                <th>THN. AKADEMIK</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>

                                        <tfoot class="bg-success">
                                            <tr>
                                                <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                                <th>NAMA</th>
                                                <th>NPM</th>
                                                <th>JENKEL</th>
                                                <th>PRODI</th>
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
    </div>
</section>

<?php $this->endSection(); ?>
<!-- =================================================================================== -->

<?php $this->extend('_admin/_Template'); ?>

<?php $this->section('title'); ?>
Data Master - Mahasiswa
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
    $(document).ready(function() {
        var table = $('#dataTableB').DataTable({
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
                    data: 'nama_mhs',
                    name: 'nama_mhs',
                    render: function(data, type, row, meta) {
                        return '<a href="javascript:update(' + row.id_mhs + ');">' + data + '</a>';
                    }
                },
                {
                    data: 'nim_mhs',
                    name: 'nim_mhs'
                },
                {
                    data: 'jenkel_mhs',
                    name: 'jenkel_mhs'
                },
                {
                    data: 'nama_prodi',
                    name: 'nama_prodi'
                },
                {
                    data: 'thn_akademik',
                    name: 'thn_akademik'
                },
                {
                    data: 'status_mhs',
                    name: 'status_mhs'
                },
            ],
            order: [
                [1, "desc"]
            ],
        });
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
                        url: "<?= current_url() ?>" + '/delete',
                        type: "DELETE",
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
                            $('#dataTable').DataTable().ajax.reload();
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
                    url: "<?= current_url() ?>" + '/create',
                    type: "POST",
                    data: {
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