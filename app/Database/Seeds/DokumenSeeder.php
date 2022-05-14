<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_dokumen'          => 1,
            'judul_dokumen'        => 'Surat Permohonan',
            'format_dokumen'       => 'PDF',
            'ukuran_dokumen'     => '1 MB',
            'path_dokumen'     => 'surat_permohonan.pdf',
            'status_dokumen'     => 'Aktif',
        ];
        $this->db->table('tb_dokumen')->insert($data);
    }
}
