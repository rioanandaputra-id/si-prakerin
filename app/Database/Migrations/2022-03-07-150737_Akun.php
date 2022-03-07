<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Akun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_hak_akses' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ],
            'email' => [
                'type' => 'CHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type' => 'CHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'aktif' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'verif' => [
                'type' => 'BOOLEAN',
                'default' => 0,
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
        $this->forge->addKey('id_akun', TRUE);
        $this->forge->addForeignKey('id_hak_akses', 'hak_akses', 'id_hak_akses');
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
        $this->forge->dropForeignKey('id_hak_akses', 'hak_akses');
    }
}
