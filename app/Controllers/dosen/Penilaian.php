<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;

class Penilaian extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Dosen") {
            echo 'Access denied';
            exit;
        }
    }
    
    public function index()
    {
        //
    }
}
