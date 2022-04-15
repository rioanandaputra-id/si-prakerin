<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pegawai' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nip_pegawai' => '11111111',
                'nama_pegawai' => 'administrator',
                'jenkel_pegawai' => 'Laki-laki',
                'tmpt_lahir_pegawai' => 'Jawa Tengah',
                'tgl_lahir_pegawai' => '1999-05-22',
                'email_pegawai' => 'administrator@praktikindustri.test',
                'no_hp_pegawai' => '081212121212',
                'alamat_pegawai' => 'Jl. Bali No.1',
                // 'status_pegawai' => 'Aktif',
                // 'pegawai_dibuat' => date('Y-m-d H:i:s'),
                // 'pegawai_diubah' => date('Y-m-d H:i:s'),
                // 'id_pembuat_pegawai' => 1,
                // 'id_pengubah_pegawai' => 1,
            ],
            [
                'id_pegawai' => '2',
                'id_akun' => '2',
                'id_prodi' => '1',
                'nip_pegawai' => '22222222',
                'nama_pegawai' => 'dosen',
                'jenkel_pegawai' => 'Laki-laki',
                'tmpt_lahir_pegawai' => 'Jakarta',
                'tgl_lahir_pegawai' => '1995-11-22',
                'email_pegawai' => 'dosen@praktikindustri.test',
                'no_hp_pegawai' => '08122222222',
                'alamat_pegawai' => 'Jl. Penjara No.1',
                // 'status_pegawai' => 'Aktif',
                // 'pegawai_dibuat' => date('Y-m-d H:i:s'),
                // 'pegawai_diubah' => date('Y-m-d H:i:s'),
                // 'id_pembuat_pegawai' => 1,
                // 'id_pengubah_pegawai' => 1,
            ]
        ];

        $this->db->table('tb_pegawai')->insertBatch($data);
    }
}
