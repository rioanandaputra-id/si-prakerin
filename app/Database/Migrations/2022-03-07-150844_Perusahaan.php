<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perusahaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perusahaan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            // 'id_prodi'           => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            //     'null'           => TRUE
            // ],
            // 'kuota_pi'     => [
            //     'type'           => 'INT',
            //     'constraint'     => 3,
            //     'null'           => TRUE
            // ],
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
            ],
            'web_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'long_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'lat_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'status_perusahaan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'dibuat'           => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'diperbarui'       => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
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
