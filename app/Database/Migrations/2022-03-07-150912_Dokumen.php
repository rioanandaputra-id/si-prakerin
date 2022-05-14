<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
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
            // 'upload_dokumen'       => [
            //     'type' => 'BOOLEAN',
            //     'default' => 0
            // ],
            'status_dokumen'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null'           => TRUE
            ],
            'id_dokumen'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
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
