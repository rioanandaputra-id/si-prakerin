<?php

namespace App\Controllers\dosen;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('_dosen/Dashboard');
    }
}