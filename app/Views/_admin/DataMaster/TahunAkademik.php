<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Tahun Akademik'; ?>
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
                                        <th>TAHUN AKADEMIK</th>
                                        <th>DIPERBAHARUI</th>
                                    </tr>
                                </thead>

                                <tfoot class="bg-success">
                                    <tr>
                                        <th style="width: 10px;"><input type="checkbox" class="checkbox_all"></th>
                                        <th>TAHUN AKADEMIK</th>
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
<!-- =================================[[[[ AKHIR KONTEN ]]]]======================================= -->


<!-- =================================[[[[ AWAL CSS JS ]]]]======================================== -->
<?php $this->section('js'); ?>

<script type="text/javascript">
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: ''
        },
        columns: [{
                data: 'id_thn_akademik',
                name: 'id_thn_akademik',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' + row.id_thn_akademik + '">';
                }
            },
            {
                data: 'thn_akademik',
                name: 'thn_akademik',
                render: function(data, type, row, meta) {
                    return '<a href="javascript:update(' + row.id_thn_akademik + ');">' + data + '</a>';
                }
            },
            {
                data: 'diperbaharui',
                name: 'diperbaharui'
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
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->