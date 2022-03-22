<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_mhs' => '1',
                'id_thn_akademik' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nim_mhs' => '11111111',
                'nama_mhs' => 'Muhammad Iqbal',
                'jenkel_mhs' => 'Laki-laki',
                'tmpt_lahir_mhs' => 'Bandung',
                'tgl_lahir_mhs' => '1990-01-01',
                'no_hp_mhs' => '081212121212',
                'alamat_mhs' => 'Jl. Surya Kencana No.1',
                'status_mhs' => 'Aktif',
                'nama_ortua' => 'Iqbal',
                'no_hp_ortua' => '081212121212',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ],
            [
                'id_mhs' => '2',
                'id_thn_akademik' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nim_mhs' => '22222222',
                'nama_mhs' => 'Doni Sumargo',
                'jenkel_mhs' => 'Laki-laki',
                'tmpt_lahir_mhs' => 'Jakarta',
                'tgl_lahir_mhs' => '1997-11-15',
                'no_hp_mhs' => '08122222222',
                'alamat_mhs' => 'Jl. Mawar No.1',
                'status_mhs' => 'Aktif',
                'nama_ortua' => 'Sumargo',
                'no_hp_ortua' => '08122222222',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('tb_mahasiswa')->insertBatch($data);
    }
}
