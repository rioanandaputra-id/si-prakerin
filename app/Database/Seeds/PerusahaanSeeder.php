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
                'alamat_perusahaan' => 'Jl. Raya Bintang Jaya, No. 1',
                'telp_perusahaan' => '081212341234',
                'email_perusahaan' => 'bintangjaya@gmail.com',
                'web_perusahaan' => 'www.bintangjaya.com',
                'long_perusahaan' => '-6.917074',
                'lat_perusahaan' => '107.619074',
                'status_perusahaan' => 'Ditolak',
                'perusahaan_dibuat' => date('Y-m-d H:i:s'),
                'perusahaan_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_perusahaan' => 1,
                'id_pengubah_perusahaan' => 1,
            ],
            [
                'id_perusahaan'          => '2',
                'nama_perusahaan' => 'CV. Sinar Sejahtera',
                'alamat_perusahaan' => 'Jl. Sinar Sejahtera, No. 1',
                'telp_perusahaan' => '081256785678',
                'email_perusahaan' => 'sinarsejahtra@gmail.com',
                'web_perusahaan' => 'www.sinarsejahtra.com',
                'long_perusahaan' => '-6.917074',
                'lat_perusahaan' => '107.619074',
                'status_perusahaan' => 'Diterima',
                'perusahaan_dibuat' => date('Y-m-d H:i:s'),
                'perusahaan_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_perusahaan' => 1,
                'id_pengubah_perusahaan' => 1,
            ],
            [
                'id_perusahaan'          => '3',
                'nama_perusahaan' => 'PT. Lentera Digital Nusantara',
                'alamat_perusahaan' => 'Jl. Lentera Digital Nusantara, No. 1',
                'telp_perusahaan' => '081256784411',
                'email_perusahaan' => 'lenteradigitalnusantara@gmail.com',
                'web_perusahaan' => 'www.lenteradigitalnusantara.com',
                'long_perusahaan' => '-6.918899',
                'lat_perusahaan' => '107.696633',
                'status_perusahaan' => 'Baru',
                'perusahaan_dibuat' => date('Y-m-d H:i:s'),
                'perusahaan_diubah' => date('Y-m-d H:i:s'),
                'id_pembuat_perusahaan' => 1,
                'id_pengubah_perusahaan' => 1,
            ],
        ];

        $this->db->table('tb_perusahaan')->insertBatch($data);
    }
}
