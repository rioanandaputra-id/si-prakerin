<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_dosen' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nip_dosen' => '11111111',
                'nama_dosen' => 'administrator',
                'jenkel_dosen' => 'Laki-laki',
                'tmpt_lahir_dosen' => 'Jawa Tengah',
                'tgl_lahir_dosen' => '1999-05-22',
                'email_dosen' => 'administrator@praktikindustri.test',
                'no_hp_dosen' => '081212121212',
                'alamat_dosen' => 'Jl. Bali No.1',
            ],
            [
                'id_dosen' => '2',
                'id_akun' => '2',
                'id_prodi' => '1',
                'nip_dosen' => '22222222',
                'nama_dosen' => 'dosen',
                'jenkel_dosen' => 'Laki-laki',
                'tmpt_lahir_dosen' => 'Jakarta',
                'tgl_lahir_dosen' => '1995-11-22',
                'email_dosen' => 'dosen@praktikindustri.test',
                'no_hp_dosen' => '08122222222',
                'alamat_dosen' => 'Jl. Penjara No.1',
            ]
        ];

        $this->db->table('tb_dosen')->insertBatch($data);
    }
}
