<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perusahaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama_perusahaan'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'alamat_perusahaan'      => [
                'type'           => 'MEDIUMTEXT',
            ],
            'telp_perusahaan'     => [
                'type'           => 'CHAR',
                'constraint'     => '20',
            ],
            'email_perusahaan'       => [
                'type'           => 'CHAR',
                'constraint'     => '150',
                'null'           => TRUE
            ],
            'web_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => TRUE
            ],
            'long_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE
            ],
            'lat_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => TRUE
            ],
            'status_perusahaan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null'           => TRUE
            ],
            'id_perusahaan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
        ]);
        $this->forge->addKey('id_perusahaan', TRUE);
        $this->forge->createTable('tb_perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_perusahaan');
    }
}
