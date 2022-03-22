<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_thn_akademik'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'thn_akademik'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
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
        $this->forge->addKey('id_thn_akademik', true);
        $this->forge->createTable('tb_tahun_akademik');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tahun_akademik');
    }
}
