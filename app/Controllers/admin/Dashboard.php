<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        // if (session()->get('hak_akses') != "Admin") {
        //     echo 'Access denied';
        //     exit;
        // }
    }
    public function index()
    {
        return view('_admin/Dashboard');
    }
}