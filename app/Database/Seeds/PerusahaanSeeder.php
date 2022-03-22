<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_perusahaan'          => '1',
                'nama_perusahaan' => 'PT. Bintang Jaya',
                'alamat_perusahaan' => 'Jl. Raya Bintang Jaya',
                'telp_perusahaan' => '081212341234',
                'email_perusahaan' => 'bintangjaya@gmail.com',
                'web_perusahaan' => 'www.bintangjaya.com',
                'long_perusahaan' => '-6.917074',
                'lat_perusahaan' => '107.619074',
                'status_perusahaan' => 'Aktif',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbarui' => date('Y-m-d H:i:s')
            ],
            [
                'id_perusahaan'          => '2',
                'nama_perusahaan' => 'CV. Sinar Sejahtera',
                'alamat_perusahaan' => 'Jl. Sinar Sejahtera',
                'telp_perusahaan' => '081256785678',
                'email_perusahaan' => 'sinarsejahtra@gmail.com',
                'web_perusahaan' => 'www.sinarsejahtra.com',
                'long_perusahaan' => '-6.917074',
                'lat_perusahaan' => '107.619074',
                'status_perusahaan' => 'Aktif',
                'dibuat' => date('Y-m-d H:i:s'),
                'diperbarui' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('tb_perusahaan')->insertBatch($data);
    }
}
