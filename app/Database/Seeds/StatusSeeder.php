<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_status' => '1', 'status' => 'Aktif'],
            ['id_status' => '2', 'status' => 'Tidak Aktif'],
            ['id_status' => '3', 'status' => 'Ditolak'],
            ['id_status' => '4', 'status' => 'Diterima'],
            ['id_status' => '5', 'status' => 'Menunggu Konfirmasi'],
            ['id_status' => '6', 'status' => 'Data Belum Lengkap'],
        ];

        $this->db->table('tb_status')->insertBatch($data);
    }
}
