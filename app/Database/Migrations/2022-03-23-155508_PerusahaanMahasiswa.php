<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerusahaanMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perusahaan_mhs'  => [
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
            'id_mhs'  => [
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
            'status_perusahaan_mhs'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
                'null'           => true,
            ],
            'dibuat'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'diperbarui'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_perusahaan_mhs', true);
        $this->forge->createTable('tb_perusahaan_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_perusahaan_mahasiswa');
    }
}
