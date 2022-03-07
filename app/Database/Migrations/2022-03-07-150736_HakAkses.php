<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HakAkses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hak_akses' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'hak_akses' => [
                'type' => 'CHAR',
                'constraint' => '100',
            ],
            'dibuat_pada' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'diperbarui_pada' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);
        $this->forge->addKey('id_hak_akses', TRUE);
        $this->forge->createTable('hak_akses');
    }

    public function down()
    {
        $this->forge->dropTable('hak_akses');
    }
}
