<?php $this->extend('/_admin/Menu/Menu'); ?>
<?php $this->section('title'); ?>
<?php echo $title = 'Data Master - Mahasiswa'; ?>
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
                            <a href="<?= site_url('admin/datamaster/mahasiswa/add') ?>"  class="btn btn-primary btn-flat btn-sm"> <i class="fa fa-plus-circle"></i>
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
                data: 'id_mahasiswa',
                name: 'id_mahasiswa',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' + row.id_mahasiswa + '">';
                }
            },
            {
                data: 'nama_mahasiswa',
                name: 'nama_mahasiswa',
                render: function(data, type, row, meta) {
                    return '<a href="<?= site_url('admin/datamaster/mahasiswa/edit/?id=') ?>' + row.id_mahasiswa + '">' + data + '</a>';
                }
            },
            {
                data: 'nim_mahasiswa',
                name: 'nim_mahasiswa'
            },
            {
                data: 'jenkel_mahasiswa',
                name: 'jenkel_mahasiswa'
            },
            {
                data: 'nama_prodi',
                name: 'nama_prodi'
            },
            {
                data: 'tahun_akademik',
                name: 'tahun_akademik'
            },
            {
                data: 'status_akun',
                name: 'status_akun'
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
        $('.checkbox_itemB:checked').each(function() {
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
                        url: "<?= site_url('admin/datamaster/mahasiswa/delete') ?>",
                        type: "POST",
                        data: {
                            'id_mahasiswa': id
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil dihapus",
                                icon: "success",
                                button: "Tutup",
                            });
                            $('.checkbox_all').prop('checked', false);
                            $('.checkbox_allB').prop('checked', false);
                            dataTable.ajax.reload();
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
</script>

<?php $this->endSection(); ?>
<!-- =================================[[[[ AKHIR CSS JS ]]]]======================================= -->