<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\DokumenModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\PerusahaanModel;
use App\Models\ProgramStudiModel;
use App\Models\TahunAkademikModel;

class DataMaster extends BaseController
{

    //--------------------------------------------------------------------

    public function view_admin()
    {
        $model = new AdminModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Admin');
    }

    public function view_dosen()
    {
        $model = new DosenModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Dosen');
    }

    public function view_mahasiswa()
    {
        $model = new MahasiswaModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Mahasiswa');
    }

    public function view_perusahaan()
    {
        $model = new PerusahaanModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Perusahaan');
    }

    public function view_tahun_akademik()
    {
        $model = new TahunAkademikModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/TahunAkademik');
    }

    public function view_program_studi()
    {
        $model = new ProgramStudiModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/ProgramStudi');
    }

    public function view_dokumen()
    {
        $model = new DokumenModel();
        if ($this->request->isAJAX()) {
            return $model->dt();
        }
        return view('_admin/DataMaster/Dokumen');
    }

    //--------------------------------------------------------------------

    public function view_add_admin()
    {
        return view('_admin/DataMaster/AdminAdd');
    }

    public function view_add_dosen()
    {
        return view('_admin/DataMaster/DosenAdd');
    }

    public function view_add_mahasiswa()
    {
        return view('_admin/DataMaster/MahasiswaAdd');
    }

    public function view_add_perusahaan()
    {
        return view('_admin/DataMaster/PerusahaanAdd');
    }

    public function view_add_tahun_akademik()
    {
        return view('_admin/DataMaster/TahunAkademikAdd');
    }

    public function view_add_program_studi()
    {
        return view('_admin/DataMaster/ProgramStudiAdd');
    }

    public function view_add_dokumen()
    {
        return view('_admin/DataMaster/DokumenAdd');
    }

    //--------------------------------------------------------------------

    public function view_edit_admin()
    {
        return view('_admin/DataMaster/AdminEdit');
    }

    public function view_edit_dosen()
    {
        return view('_admin/DataMaster/DosenEdit');
    }

    public function view_edit_mahasiswa()
    {
        return view('_admin/DataMaster/MahasiswaEdit');
    }

    public function view_edit_perusahaan()
    {
        return view('_admin/DataMaster/PerusahaanEdit');
    }

    public function view_edit_tahun_akademik()
    {
        return view('_admin/DataMaster/TahunAkademikEdit');
    }

    public function view_edit_program_studi()
    {
        return view('_admin/DataMaster/ProgramStudiEdit');
    }

    public function view_edit_dokumen()
    {
        return view('_admin/DataMaster/DokumenEdit');
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
