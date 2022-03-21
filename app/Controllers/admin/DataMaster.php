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
                ->join('tb_program_studi', 'tb_dosen.id_prodi = tb_program_studi.id', 'LEFT JOIN')
                ->join('users', 'tb_dosen.id_akun = users.id', 'INNER JOIN')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="detail" class="btn btn-primary btn-sm mr-1" onclick="update(`' . $data->id . '`)"> <i class="fa fa-search text-white"></i> </button>' .
                        '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id . '`)"> <i class="fa fa-edit text-white"></i> </button>';
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
                ->join('tb_tahun_akademik', 'tb_mahasiswa.id_thn_akademik = tb_tahun_akademik.id', 'LEFT JOIN')
                ->join('tb_program_studi', 'tb_mahasiswa.id_prodi = tb_program_studi.id', 'LEFT JOIN')
                ->join('users', 'tb_mahasiswa.id_akun = users.id', 'INNER JOIN')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="detail" class="btn btn-primary btn-sm mr-1" onclick="update(`' . $data->id . '`)"> <i class="fa fa-search text-white"></i> </button>'.
                           '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_Mahasiswa');
    }

    public function view_perusahaan()
    {
        //
    }

    public function view_tahun_akademik()
    {
        if ($this->request->isAJAX()) {
            $data = DataTables::use('tb_tahun_akademik')
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id . '`, `' . $data->tahun_akademik . '`)"> <i class="fa fa-edit text-white"></i> </button>';
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
                    return '<input type="checkbox" class="checkbox_item" name="checkbox_item[]" value="' . $data->id . '">';
                })
                ->addColumn('aksi', function ($data) {
                    return '<button type="button" id="edit" class="btn btn-warning btn-sm" onclick="update(`' . $data->id . '`, `' . $data->nama_prodi . '`, `' . $data->nama_alias . '`)"> <i class="fa fa-edit text-white"></i> </button>';
                })
                ->rawColumns(['checkbox', 'aksi'])
                ->make();
            return $data;
        }
        return view('_admin/DataMaster_ProgramStudi');
    }

    public function view_dokumen()
    {
        //
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
