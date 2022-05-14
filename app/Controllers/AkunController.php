<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;

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
        $mDosen = new DosenModel();
        $mMahasiswa = new MahasiswaModel();

        $dAkun = $mDosen->getIdAkun($akun['id_akun']);
        $mAkun = $mMahasiswa->getIdAkun($akun['id_akun']);

        $id_pengguna = $dAkun['id_dosen'] ?? $mAkun['id_mahasiswa'] ?? null;
        $nama_lengkap = $dAkun['nama_dosen'] ?? $mAkun['nama_mahasiswa'] ?? null;
        $nim_nip = $dAkun['nip_dosen'] ?? $mAkun['nim_mahasiswa'] ?? null;

        $data = [
            'id_akun' => $akun['id_akun'],
            'id_pengguna' =>  $id_pengguna,
            'nama_lengkap' => $nama_lengkap,
            'nim_nip' => $nim_nip,
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
