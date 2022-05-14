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
                'status_tahun_akademik' => 'Aktif',
            ],
            [
                'id_tahun_akademik' => '2',
                'tahun_akademik' => '2020/2021',
                'status_tahun_akademik' => 'Aktif',
            ],
            [
                'id_tahun_akademik' => '3',
                'tahun_akademik' => '2021/2022',
                'status_tahun_akademik' => 'Aktif',
            ],
            [
                'id_tahun_akademik' => '4',
                'tahun_akademik' => '2022/2023',
                'status_tahun_akademik' => 'Aktif',
            ],
            [
                'id_tahun_akademik' => '5',
                'tahun_akademik' => '2023/2024',
                'status_tahun_akademik' => 'Aktif',
            ],
        ];

        $this->db->table('tb_tahun_akademik')->insertBatch($data);
    }
}
