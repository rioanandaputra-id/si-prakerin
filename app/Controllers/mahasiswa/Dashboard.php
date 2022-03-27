<?php

namespace App\Controllers\mahasiswa;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('_mahasiswa/Dashboard/Dashboard');
    }
}