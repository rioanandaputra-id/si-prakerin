<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
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
            'id_dokumen'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            // 'dokumen_dibuat'           => [
            //     'type'           => 'DATETIME',
            // ],
            // 'dokumen_diubah'       => [
            //     'type'           => 'DATETIME',
            //     'null'           => TRUE,
            // ],
            // 'id_pembuat_dokumen'         => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            // ],
            // 'id_pengubah_dokumen'        => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            //     'null'           => TRUE
            // ],

        ]);
        $this->forge->addKey('id_dokumen', TRUE);
        $this->forge->createTable('tb_dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dokumen');
    }
}
