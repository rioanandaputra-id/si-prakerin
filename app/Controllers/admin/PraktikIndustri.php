<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\PerusahaanModel;

class PraktikIndustri extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Administrator") {
            echo 'Access denied';
            exit;
        }
    }
    
    public function PraktikIndustriView()
    {
        return view('_admin/PraktikIndustri/PraktikIndustri');
    }

    public function PraktikIndustriViewAdd()
    {
        $mPerusahaan    = new PerusahaanModel();
        $mMahasiswa     = new MahasiswaModel();
        $data['Perusahaan'] = $mPerusahaan->getStatus('Aktif');
        $data['Mahasiswa']  = $mMahasiswa->findAll();
        return view('_admin/PraktikIndustri/PraktikIndustriAdd', $data);
        
    }

    public function PraktikIndustriViewEdit()
    {
        return view('_admin/PraktikIndustri/PraktikIndustriEdit');
    }

    public function PraktikIndustriCreate()
    {
        //
    }

    public function PraktikIndustriUpdate()
    {
        //
    }

    public function PraktikIndustriDelete()
    {
        //
    }
}
