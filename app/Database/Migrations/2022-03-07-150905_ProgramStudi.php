<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramStudi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama_prodi'  => [
                'type'            => 'VARCHAR',
                'constraint'      => '100',
            ],
            'nama_alias'  => [
                'type'            => 'VARCHAR',
                'constraint'      => '100',
            ],
            'status_prodi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null'           => TRUE
            ],
            'id_prodi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
        ]);
        $this->forge->addKey('id_prodi', TRUE);
        $this->forge->createTable('tb_prodi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_prodi');
    }
}
