<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerusahaanPenilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'perusahaan_nilai'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'perusahaan_nilai_detail'  => [
                'type'           => 'TEXT',
            ],
            'id_perusahaan_penilaian'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_perusahaan_mahasiswa'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_bimbingan'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_perusahaan_penilaian', true);
        $this->forge->createTable('tb_perusahaan_penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('tb_perusahaan_penilaian');
    }
}
