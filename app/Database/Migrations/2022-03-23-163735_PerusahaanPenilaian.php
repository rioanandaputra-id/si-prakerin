<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerusahaanPenilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perusahaan_penilaian'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_perusahaan_mhs'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_bimbingan'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'nilai_detail'  => [
                'type'           => 'TEXT',
            ],
            'dibuat'          => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'diperbarui'          => [
                'type'           => 'DATETIME',
                'null'           => true,
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
