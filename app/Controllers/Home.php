<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('_Backend/Pages/Dashboard/Index');
    }
}
