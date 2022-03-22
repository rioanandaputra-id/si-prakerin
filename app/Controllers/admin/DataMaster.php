<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class DataMaster extends BaseController
{

    //--------------------------------------------------------------------

    public function view_admin()
    {
        //
    }

    public function view_dosen()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_dosen')
                ->join('tb_program_studi', 'tb_dosen.id_prodi = tb_program_studi.id_prodi', 'LEFT JOIN')
                ->join('users', 'tb_dosen.id_akun = users.id', 'INNER JOIN')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id_dsn . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="detail" class="btn btn-primary btn-sm mr-1" onclick="update(`' . $data->id_dsn . '`)"> <i class="fa fa-search text-white"></i> </button>' .
                        '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id_dsn . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_Dosen');
    }

    public function view_mahasiswa()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_mahasiswa')
                ->join('tb_tahun_akademik', 'tb_mahasiswa.id_thn_akademik = tb_tahun_akademik.id_thn_akademik', 'LEFT JOIN')
                ->join('tb_program_studi', 'tb_mahasiswa.id_prodi = tb_program_studi.id_prodi', 'LEFT JOIN')
                ->join('users', 'tb_mahasiswa.id_akun = users.id', 'INNER JOIN')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id_mhs . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="detail" class="btn btn-primary btn-sm mr-1" onclick="update(`' . $data->id_mhs . '`)"> <i class="fa fa-search text-white"></i> </button>'.
                           '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id_mhs . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_Mahasiswa');
    }

    public function view_perusahaan()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_perusahaan')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id_perusahaan . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id_perusahaan . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_Perusahaan');
    }

    public function view_tahun_akademik()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_tahun_akademik')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id_thn_akademik . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id_thn_akademik . '`, `' . $data->thn_akademik . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_TahunAkademik');
    }

    public function view_program_studi()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_program_studi')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id_prodi . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id_prodi . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_ProgramStudi');
    }

    public function view_dokumen()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_dokumen')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id_dokumen . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id_dokumen . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_Dokumen');
    }

    //--------------------------------------------------------------------

    public function view_add_admin()
    {
        //
    }

    public function view_add_dosen()
    {
        //
    }

    public function view_add_mahasiswa()
    {
        //
    }

    public function view_add_perusahaan()
    {
        //
    }

    public function view_add_tahun_akademik()
    {
        //
    }

    public function view_add_program_studi()
    {
        //
    }

    public function view_add_dokumen()
    {
        //
    }

    //--------------------------------------------------------------------

    public function view_edit_admin()
    {
        //
    }

    public function view_edit_dosen()
    {
        //
    }

    public function view_edit_mahasiswa()
    {
        //
    }

    public function view_edit_perusahaan()
    {
        //
    }

    public function view_edit_tahun_akademik()
    {
        //
    }

    public function view_edit_program_studi()
    {
        //
    }

    public function view_edit_dokumen()
    {
        //
    }

    //--------------------------------------------------------------------

    public function create_admin()
    {
        //
    }

    public function create_dosen()
    {
        //
    }

    public function create_mahasiswa()
    {
        //
    }

    public function create_perusahaan()
    {
        //
    }

    public function create_tahun_akademik()
    {
        //
    }

    public function create_program_studi()
    {
        //
    }

    public function create_dokumen()
    {
        //
    }

    //--------------------------------------------------------------------

    public function update_admin()
    {
        //
    }

    public function update_dosen()
    {
        //
    }

    public function update_mahasiswa()
    {
        //
    }

    public function update_perusahaan()
    {
        //
    }

    public function update_tahun_akademik()
    {
        //
    }

    public function update_program_studi()
    {
        //
    }

    public function update_dokumen()
    {
        //
    }

    //--------------------------------------------------------------------

    public function delete_admin()
    {
        //
    }

    public function delete_dosen()
    {
        //
    }

    public function delete_mahasiswa()
    {
        //
    }

    public function delete_perusahaan()
    {
        //
    }

    public function delete_tahun_akademik()
    {
        //
    }

    public function delete_program_studi()
    {
        //
    }

    public function delete_dokumen()
    {
        //
    }
}
