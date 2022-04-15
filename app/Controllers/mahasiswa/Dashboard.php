<?php

namespace App\Controllers\mahasiswa;

use App\Controllers\BaseController;

class Dashboard extends BaseController
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
        return view('_mahasiswa/Dashboard/Dashboard');
    }
}