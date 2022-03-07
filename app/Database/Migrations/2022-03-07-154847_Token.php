<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Token extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_token' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'dibuat_pada' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'kadaluarsa_pada' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);
        $this->forge->addKey('id_token', TRUE);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun');
        $this->forge->createTable('token');
    }

    public function down()
    {
        $this->forge->dropTable('token');
        $this->forge->dropForeignKey('id_akun', 'akun');
    }
}
