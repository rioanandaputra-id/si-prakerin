<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\PerusahaanModel;

class PraktikIndustri extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Mahasiswa") {
            echo 'Access denied';
            exit;
        }
    }

    public function PraktikIndustriView()
    {
        $model  = new PerusahaanModel();
        $id     = $this->request->getGet('id');
        $detail = $this->request->getGet('detail');
        $ajax   = $this->request->isAJAX();

        if ($detail == true) {
            $data = $model->find($id);
            if ($data) {
                return view('_mahasiswa/PraktikIndustri/PraktikIndustriDetail', ['perusahaan' => $data]);
            } else {
                throw new PageNotFoundException('Halaman tidak ditemukan');
            }
        } else {
            if ($ajax) {
                return $model->getDt(true);
            } else {
                return view('_mahasiswa/PraktikIndustri/PraktikIndustri');
            }
        }
    }

    public function PraktikIndustriViewHistory()
    {
        # code...
    }

    public function PraktikIndustriViewHistoryDetail()
    {
        # code...
    }

    public function PraktikIndustriCreate()
    {
        # code...
    }
}
