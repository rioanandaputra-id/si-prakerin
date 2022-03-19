<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tahun_akademik'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'dibuat_pada' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'diperbaharui_pada' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_tahun_akademik');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tahun_akademik');
    }
}
