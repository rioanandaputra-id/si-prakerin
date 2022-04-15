<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bimbingan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'judul_laporan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_judul' => [
                'type' => 'ENUM("Ulang","Setuju")',
            ],
            'status_seminar' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_bimbingan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_mahasiswa_perusahaan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_seminar' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_bimbingan', true);
        $this->forge->createTable('tb_bimbingan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_bimbingan');
    }
}
