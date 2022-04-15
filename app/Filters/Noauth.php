<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn')) {

			if (session()->get('peran_akun') == "Administrator") {
				return redirect()->to(base_url('admin'));
			}

			if (session()->get('peran_akun') == "Dosen") {
				return redirect()->to(base_url('dosen'));
			}

            if (session()->get('peran_akun') == "Mahasiswa") {
				return redirect()->to(base_url('mahasiswa'));
			}
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}