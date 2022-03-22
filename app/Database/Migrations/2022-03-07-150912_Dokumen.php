<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            // 'jenis_dokumen'        => [
            //     'type'           => 'VARCHAR',
            //     'constraint'     => '100',
            // ],
            'judul_dokumen'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'format_dokumen'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'ukuran_dokumen'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'path_dokumen'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'upload_dokumen'       => [
                'type' => 'BOOLEAN',
                'default' => 0
            ],
            'status_dokumen'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'dibuat'     => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'diperbarui'     => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],

        ]);
        $this->forge->addKey('id_dokumen', TRUE);
        $this->forge->createTable('tb_dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dokumen');
    }
}
