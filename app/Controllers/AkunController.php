<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkunModel;

class AkunController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required',
                'password' => 'required|validateAkun[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateAkun' => "Username dan Password tidak cocok | Akun tidak aktif",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('_Auth/login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new AkunModel();

                $akun = $model->where('username', $this->request->getVar('username'))
                    ->first();

                // Stroing session values
                $this->setUserSession($akun);

                // Redirecting to dashboard after login
                if ($akun['peran_akun'] == "Administrator") {
                    return redirect()->to(base_url('admin'));

                } elseif ($akun['peran_akun'] == "Dosen") {
                    return redirect()->to(base_url('dosen'));

                } elseif ($akun['peran_akun'] == "Mahasiswa") {
                    return redirect()->to(base_url('mahasiswa'));

                }
            }
        }
        return view('_Auth/login');
    }

    private function setUserSession($akun)
    {
        $data = [
            'id_akun' => $akun['id_akun'],
            'username' => $akun['username'],
            "peran_akun" => $akun['peran_akun'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
