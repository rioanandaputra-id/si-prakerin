<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerusahaanProgramStudi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perusahaan_prodi'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_perusahaan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_prodi'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kuota_perusahaan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'dibuat' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'diperbarui' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_perusahaan_prodi', true);
        $this->forge->createTable('tb_perusahaan_program_studi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_perusahaan_program_studi');
    }
}
