<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BimbinganJudulRiwayat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_bimbingan' => [
                'type' => 'DATETIME',
            ],
            'id_bimbingan_judul_riwayat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_bimbingan_judul' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_bimbingan_judul_riwayat', true);
        $this->forge->createTable('tb_bimbingan_judul_riwayat');
    }

    public function down()
    {
        $this->forge->dropTable('tb_bimbingan_judul_riwayat');
    }
}
