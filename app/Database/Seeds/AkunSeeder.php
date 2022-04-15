<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSeeder extends Seeder
{
    public function run()
    {
        $model = new \App\Models\AkunModel();
        $model->insertBatch([
            [
                'id_akun' => '1',
                'username' => 'admin',
                'password' => password_hash("admin", PASSWORD_DEFAULT),
                'peran_akun' => 'Administrator',
                'status_akun' => 'Aktif',
            ],
            [
                'id_akun' => '2',
                'username' => 'dosen',
                'password' => password_hash("dosen", PASSWORD_DEFAULT),
                'peran_akun' => 'Dosen',
                'status_akun' => 'Aktif',
            ],
            [
                'id_akun' => '3',
                'username' => 'mahasiswa1',
                'password' => password_hash("mahasiswa1", PASSWORD_DEFAULT),
                'peran_akun' => 'Mahasiswa',
                'status_akun' => 'Aktif',
            ],
            [
                'id_akun' => '4',
                'username' => 'mahasiswa2',
                'password' => password_hash("mahasiswa2", PASSWORD_DEFAULT),
                'peran_akun' => 'Mahasiswa',
                'status_akun' => 'Aktif',
            ],
            [
                'id_akun' => '5',
                'username' => 'mahasiswa3',
                'password' => password_hash("mahasiswa3", PASSWORD_DEFAULT),
                'peran_akun' => 'Mahasiswa',
                'status_akun' => 'Aktif',
            ],
        ]);
    }
}
