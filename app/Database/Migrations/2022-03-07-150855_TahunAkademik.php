<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tahun_akademik'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'status_tahun_akademik'       => [
                'type' => 'enum',
                'constraint' => "'Aktif','Tidak Aktif'",
            ],
            'id_tahun_akademik'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // 'tahun_akademik_dibuat'           => [
            //     'type'           => 'DATETIME',
            // ],
            // 'tahun_akademik_diubah'       => [
            //     'type'           => 'DATETIME',
            //     'null'           => TRUE,
            // ],
            // 'id_pembuat_tahun_akademik'         => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            // ],
            // 'id_pengubah_tahun_akademik'        => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            //     'null'           => TRUE
            // ],
        ]);
        $this->forge->addKey('id_tahun_akademik', true);
        $this->forge->createTable('tb_tahun_akademik');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tahun_akademik');
    }
}
