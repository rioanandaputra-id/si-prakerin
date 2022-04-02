<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_mahasiswa' => '1',
                'id_tahun_akademik' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nim_mahasiswa' => '11111111',
                'nama_mahasiswa' => 'Muhammad Iqbal',
                'jenkel_mahasiswa' => 'Laki-laki',
                'tmpt_lahir_mahasiswa' => 'Bandung',
                'tgl_lahir_mahasiswa' => '1990-01-01',
                'no_hp_mahasiswa' => '081212121212',
                'alamat_mahasiswa' => 'Jl. Surya Kencana No.1',
                'nama_ortua' => 'Iqbal',
                'no_hp_ortua' => '081212121212',
                'status_mahasiswa' => 'Pengajuan Baru',
                // 'mahasiswa_dibuat' => date('Y-m-d H:i:s'),
                // 'mahasiswa_diubah' => date('Y-m-d H:i:s'),
                // 'id_pembuat_mahasiswa' => 1,
                // 'id_pengubah_mahasiswa' => 1,
            ],
            [
                'id_mahasiswa' => '2',
                'id_tahun_akademik' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nim_mahasiswa' => '22222222',
                'nama_mahasiswa' => 'Doni Sumargo',
                'jenkel_mahasiswa' => 'Laki-laki',
                'tmpt_lahir_mahasiswa' => 'Jakarta',
                'tgl_lahir_mahasiswa' => '1997-11-15',
                'no_hp_mahasiswa' => '08122222222',
                'alamat_mahasiswa' => 'Jl. Mawar No.1',
                'nama_ortua' => 'Sumargo',
                'no_hp_ortua' => '08122222222',
                'status_mahasiswa' => 'Pengajuan Diterima',
                // 'mahasiswa_dibuat' => date('Y-m-d H:i:s'),
                // 'mahasiswa_diubah' => date('Y-m-d H:i:s'),
                // 'id_pembuat_mahasiswa' => 1,
                // 'id_pengubah_mahasiswa' => 1,
            ],
            [
                'id_mahasiswa' => '3',
                'id_tahun_akademik' => '1',
                'id_akun' => '1',
                'id_prodi' => '1',
                'nim_mahasiswa' => '33333333',
                'nama_mahasiswa' => 'Putri Ayu',
                'jenkel_mahasiswa' => 'Perempuan',
                'tmpt_lahir_mahasiswa' => 'Medan',
                'tgl_lahir_mahasiswa' => '1999-10-21',
                'no_hp_mahasiswa' => '08133333333',
                'alamat_mahasiswa' => 'Jl. Horas Bro No.1',
                'nama_ortua' => 'Aduh Biyung',
                'no_hp_ortua' => '08133333333',
                'status_mahasiswa' => 'Pengajuan Ditolak',
                // 'mahasiswa_dibuat' => date('Y-m-d H:i:s'),
                // 'mahasiswa_diubah' => date('Y-m-d H:i:s'),
                // 'id_pembuat_mahasiswa' => 1,
                // 'id_pengubah_mahasiswa' => 1,
            ]
        ];

        $this->db->table('tb_mahasiswa')->insertBatch($data);
    }
}
