<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BimbinganJudulRiwayatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'keterangan' => 'Keterangan A',
                'tanggal_bimbingan' => date('Y-m-d H:i:s'),
                'id_bimbingan_judul_riwayat' => 1,
                'id_bimbingan_judul' => 1,
                'id_dokumen' => 1,
            ],
            [
                'keterangan' => 'Keterangan B',
                'tanggal_bimbingan' => date('Y-m-d H:i:s'),
                'id_bimbingan_judul_riwayat' => 2,
                'id_bimbingan_judul' => 2,
                'id_dokumen' => 2,
            ],
            [
                'keterangan' => 'Keterangan C',
                'tanggal_bimbingan' => date('Y-m-d H:i:s'),
                'id_bimbingan_judul_riwayat' => 3,
                'id_bimbingan_judul' => 3,
                'id_dokumen' => 3,
            ],
        ];
        $this->db->table('tb_bimbingan_judul_riwayat')->insertBatch($data);
    }
}
