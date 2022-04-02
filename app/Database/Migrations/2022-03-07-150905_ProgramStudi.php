<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramStudi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_prodi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_prodi'  => [
                'type'            => 'VARCHAR',
                'constraint'      => '100',
            ],
            'nama_alias'  => [
                'type'            => 'VARCHAR',
                'constraint'      => '100',
            ],
            'status_prodi'  => [
                'type'            => 'VARCHAR',
                'constraint'      => '30',
            ],
            // 'prodi_dibuat'           => [
            //     'type'           => 'DATETIME',
            // ],
            // 'prodi_diubah'       => [
            //     'type'           => 'DATETIME',
            //     'null'           => TRUE,
            // ],
            // 'id_pembuat_prodi'         => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            // ],
            // 'id_pengubah_prodi'        => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            //     'null'           => TRUE
            // ],
        ]);
        $this->forge->addKey('id_prodi', TRUE);
        $this->forge->createTable('tb_prodi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_prodi');
    }
}
