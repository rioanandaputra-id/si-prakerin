<?php 
namespace App\Controllers\_Backend;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
        return view('_Backend/Dashboard/index');
    }
}