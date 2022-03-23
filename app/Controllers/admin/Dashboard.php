<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
class Dashboard extends BaseController
{   
    public function index()
    {
        $title = 'Dashboard';
        return view('_admin/Dashboard/Dashboard', compact('title'));
    }
}