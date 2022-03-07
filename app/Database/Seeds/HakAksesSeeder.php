<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HakAksesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_hak_akses' => '1',
                'hak_akses' => 'Admin',
                'dibuat_pada' => date('Y-m-d H:i:s'),
                'diperbarui_pada' => date('Y-m-d H:i:s'),
            ],
            [
                'id_hak_akses' => '2',
                'hak_akses' => 'Dosen',
                'dibuat_pada' => date('Y-m-d H:i:s'),
                'diperbarui_pada' => date('Y-m-d H:i:s'),
            ],
            [
                'id_hak_akses' => '3',
                'hak_akses' => 'Mahasiswa',
                'dibuat_pada' => date('Y-m-d H:i:s'),
                'diperbarui_pada' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('hak_akses')->insertBatch($data);
    }
}
