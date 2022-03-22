<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MahasiswaPerusahaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mhs_perusahaan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_mhs' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_perusahaan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'dibuat' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'diperbarui' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_mhs_perusahaan', true);
        $this->forge->createTable('tb_mhs_perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_mhs_perusahaan');
    }
}
