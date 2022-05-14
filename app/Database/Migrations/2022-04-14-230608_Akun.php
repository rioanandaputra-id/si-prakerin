<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Akun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'peran_akun' => [
                'type' => 'enum',
                'constraint' => "'Administrator','Dosen','Mahasiswa'",
            ],
            'status_akun'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
        ]);
        $this->forge->addKey('id_akun', true);
        $this->forge->createTable('tb_akun');
    }

    public function down()
    {
        $this->forge->dropTable('tb_akun');
    }
}
