<?php

namespace App\Controllers\dosen;

use App\Controllers\BaseController;

class Dashboard extends BaseController
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
        return view('_dosen/Dashboard');
    }
}