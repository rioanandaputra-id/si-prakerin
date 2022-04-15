<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerusahaanMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'status_perusahaan_mahasiswa'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
                'null'           => true,
            ],
            'id_perusahaan_mahasiswa'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_perusahaan'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_mahasiswa'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_dokumen'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_perusahaan_mahasiswa', true);
        $this->forge->createTable('tb_perusahaan_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_perusahaan_mahasiswa');
    }
}
