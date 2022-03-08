<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_akun' => '1',
                'id_hak_akses' => '1',
                'email' => 'admin@siprakerin.test',
                'username' => 'admin',
                'password' => password_hash('admin@siprakerin.test', PASSWORD_DEFAULT),
                'aktif' => '1',
                'verif' => '1',
                'dibuat_pada' => date('Y-m-d H:i:s'),
                'diperbarui_pada' => date('Y-m-d H:i:s'),
            ],
            [
                'id_akun' => '2',
                'id_hak_akses' => '2',
                'email' => 'dosen@siprakerin.test',
                'username' => 'dosen',
                'password' => password_hash('dosen@siprakerin.test', PASSWORD_DEFAULT),
                'aktif' => '1',
                'verif' => '1',
                'dibuat_pada' => date('Y-m-d H:i:s'),
                'diperbarui_pada' => date('Y-m-d H:i:s'),
            ],
            [
                'id_akun' => '3',
                'id_hak_akses' => '3',
                'email' => 'mahasiswa@siprakerin.test',
                'username' => 'mahasiswa',
                'password' => password_hash('mahasiswa@siprakerin.test', PASSWORD_DEFAULT),
                'aktif' => '1',
                'verif' => '1',
                'dibuat_pada' => date('Y-m-d H:i:s'),
                'diperbarui_pada' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('akun')->insertBatch($data);
    }
}
