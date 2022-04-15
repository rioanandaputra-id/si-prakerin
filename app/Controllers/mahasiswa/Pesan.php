<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;

class Pesan extends BaseController
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
        //
    }
}
