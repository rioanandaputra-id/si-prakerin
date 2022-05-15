<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\BimbinganJudulModel;

class Bimbingan extends BaseController
{
    public function BimbinganView()
    {
        $mBimbingan = new BimbinganJudulModel();
        $ajax   = $this->request->isAJAX();

        if ($ajax) {
            return $mBimbingan->getDt(session()->get('id_pengguna'));
        } else {
            return view('_mahasiswa/Bimbingan/Bimbingan');
        }
    }
}
