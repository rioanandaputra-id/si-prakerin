<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BimbinganJudulSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul_diajukan' => 'Judul A',
                'tanggal_diajukan' => date('Y-m-d H:i:s'),
                'status_bimbingan' => 'Diajukan',
                'id_bimbingan_judul' => 1,
                'id_bimbingan' => 1
            ],
            [
                'judul_diajukan' => 'Judul B',
                'tanggal_diajukan' => date('Y-m-d H:i:s'),
                'status_bimbingan' => 'Diajukan',
                'id_bimbingan_judul' => 2,
                'id_bimbingan' => 2
            ],
            [
                'judul_diajukan' => 'Judul C',
                'tanggal_diajukan' => date('Y-m-d H:i:s'),
                'status_bimbingan' => 'Diajukan',
                'id_bimbingan_judul' => 3,
                'id_bimbingan' => 3
            ],
        ];
        $this->db->table('tb_bimbingan_judul')->insertBatch($data);
    }
}
