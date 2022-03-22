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
            'dibuat' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'diperbaharui' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_prodi', TRUE);
        $this->forge->createTable('tb_program_studi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_program_studi');
    }
}
