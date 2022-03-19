<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
class Dashboard extends BaseController
{
    public function __construct()
    {
    }
    
    public function index()
    {
        return view('_admin/Dashboard');
    }
}