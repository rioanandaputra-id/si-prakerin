<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_dokumen'          => 1,
            // 'jenis_dokumen'        => 'Surat Permohonan',
            'judul_dokumen'        => 'Surat Permohonan',
            'format_dokumen'       => 'PDF',
            'ukuran_dokumen'     => '1 MB',
            'path_dokumen'     => 'surat_permohonan.pdf',
            'upload_dokumen'       => 1,
            'status_dokumen'     => 'Aktif',
            'dibuat'     => '2020-03-07',
            'diperbarui'     => '2020-03-07',
        ];
        $this->db->table('tb_dokumen')->insert($data);
    }
}
