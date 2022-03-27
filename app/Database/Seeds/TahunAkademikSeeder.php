<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_tahun_akademik' => '1',
                'tahun_akademik' => '2019/2020',
                'tahun_akademik_dibuat' => date('Y-m-d H:i:s'),
                'tahun_akademik_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_tahun_akademik' => 1,
                'id_pengubah_tahun_akademik' => 1,
            ],
            [
                'id_tahun_akademik' => '2',
                'tahun_akademik' => '2020/2021',
                'tahun_akademik_dibuat' => date('Y-m-d H:i:s'),
                'tahun_akademik_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_tahun_akademik' => 1,
                'id_pengubah_tahun_akademik' => 1,
            ],
            [
                'id_tahun_akademik' => '3',
                'tahun_akademik' => '2021/2022',
                'tahun_akademik_dibuat' => date('Y-m-d H:i:s'),
                'tahun_akademik_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_tahun_akademik' => 1,
                'id_pengubah_tahun_akademik' => 1,
            ],
            [
                'id_tahun_akademik' => '4',
                'tahun_akademik' => '2022/2023',
                'tahun_akademik_dibuat' => date('Y-m-d H:i:s'),
                'tahun_akademik_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_tahun_akademik' => 1,
                'id_pengubah_tahun_akademik' => 1,
            ],
            [
                'id_tahun_akademik' => '5',
                'tahun_akademik' => '2023/2024',
                'tahun_akademik_dibuat' => date('Y-m-d H:i:s'),
                'tahun_akademik_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_tahun_akademik' => 1,
                'id_pengubah_tahun_akademik' => 1,
            ],
        ];

        $this->db->table('tb_tahun_akademik')->insertBatch($data);
    }
}
