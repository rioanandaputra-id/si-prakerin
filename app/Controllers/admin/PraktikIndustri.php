<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PraktikIndustri extends BaseController
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
        //
    }
}
