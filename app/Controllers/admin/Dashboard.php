<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        if (session()->get('peran_akun') != "Administrator") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $title = 'Dashboard';
        return view('_admin/Dashboard/Dashboard', compact('title'));
    }
}
