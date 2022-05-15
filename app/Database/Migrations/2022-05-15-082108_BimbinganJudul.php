<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BimbinganJudul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'judul_diajukan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_diajukan' => [
                'type' => 'DATETIME',
            ],
            'status_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_bimbingan_judul' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_bimbingan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_bimbingan_judul', true);
        $this->forge->createTable('tb_bimbingan_judul');
    }

    public function down()
    {
        $this->forge->dropTable('tb_bimbingan_judul');
    }
}
