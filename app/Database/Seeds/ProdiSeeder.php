<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_prodi' => '1',
                'nama_prodi' => 'Teknik Informatika (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '2',
                'nama_prodi' => 'Teknik Elektro (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '3',
                'nama_prodi' => 'Teknik Kimia (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '4',
                'nama_prodi' => 'Teknik Industri (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '5',
                'nama_prodi' => 'Teknik Sipil (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '6',
                'nama_prodi' => 'Teknik Mesin (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '7',
                'nama_prodi' => 'Teknik Lingkungan (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '8',
                'nama_prodi' => 'Teknik Arsitektur (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '9',
                'nama_prodi' => 'Teknik Geodesi (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '10',
                'nama_prodi' => 'Teknik Geomatika (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '11',
                'nama_prodi' => 'Teknik Geologi (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '12',
                'nama_prodi' => 'Teknik Geofisika (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
            [
                'id_prodi' => '13',
                'nama_prodi' => 'Teknik Geologi (S1)',
                'nama_alias' => NULL,
                'prodi_dibuat' => date('Y-m-d H:i:s'),
                'prodi_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_prodi' => 1,
                'id_pengubah_prodi' => 1,
            ],
        ];

        $this->db->table('tb_prodi')->insertBatch($data);
    }
}
