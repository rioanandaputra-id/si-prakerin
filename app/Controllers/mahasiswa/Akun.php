<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Akun extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Mahasiswa") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $model = new MahasiswaModel();
        $mahasiswa = $model
            ->where('id_akun', user_id())
            ->thn_akademik()
            ->prodi()
            ->akun()
            ->first();
        return view('_mahasiswa/Akun/Akun', compact('mahasiswa'));
    }

    public function update()
    {
    }
}
