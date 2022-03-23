<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_dsn' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nip_dsn' => '11111111',
                'nama_dsn' => 'Doni Caknun',
                'jenkel_dsn' => 'Laki-laki',
                'tmpt_lahir_dsn' => 'Jawa Tengah',
                'tgl_lahir_dsn' => '1999-05-22',
                'no_hp_dsn' => '081212121212',
                'alamat_dsn' => 'Jl. Bali No.1',
                'status_dsn' => 'Aktif',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbarui' => date('Y-m-d H:i:s')
            ],
            [
                'id_dsn' => '2',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nip_dsn' => '22222222',
                'nama_dsn' => 'Doni Salmon',
                'jenkel_dsn' => 'Laki-laki',
                'tmpt_lahir_dsn' => 'Jakarta',
                'tgl_lahir_dsn' => '1995-11-22',
                'no_hp_dsn' => '08122222222',
                'alamat_dsn' => 'Jl. Penjara No.1',
                'status_dsn' => 'Aktif',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbarui' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('tb_dosen')->insertBatch($data);
    }
}
