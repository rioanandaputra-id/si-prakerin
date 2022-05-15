<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BimbinganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_mahasiswa' => 1,
                'id_dosen' => 2,
                'id_bimbingan' => 1
            ],
            [
                'id_mahasiswa' => 2,
                'id_dosen' => 2,
                'id_bimbingan' => 2
            ],
            [
                'id_mahasiswa' => 3,
                'id_dosen' => 2,
                'id_bimbingan' => 3
            ],
        ];
        $this->db->table('tb_bimbingan')->insertBatch($data);
    }
}
