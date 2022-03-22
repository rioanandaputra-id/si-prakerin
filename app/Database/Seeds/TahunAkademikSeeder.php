<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_thn_akademik' => '1',
                'thn_akademik' => '2019/2020',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ],
            [
                'id_thn_akademik' => '2',
                'thn_akademik' => '2020/2021',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ],
            [
                'id_thn_akademik' => '3',
                'thn_akademik' => '2021/2022',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ],
            [
                'id_thn_akademik' => '4',
                'thn_akademik' => '2022/2023',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ],
            [
                'id_thn_akademik' => '5',
                'thn_akademik' => '2023/2024',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbaharui' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('tb_tahun_akademik')->insertBatch($data);
    }
}
