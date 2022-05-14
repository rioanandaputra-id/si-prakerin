<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PraktikIndustri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'waktu_awal_praktik_industri'  => [
                'type' => 'date',
                'null' => true,
            ],
            'waktu_akhir_praktik_industri'  => [
                'type' => 'date',
                'null' => true,
            ],
            'status_praktik_industri'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null'           => TRUE
            ],
            'id_praktik_industri'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_perusahaan'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_mahasiswa'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
        ]);
        $this->forge->addKey('id_praktik_industri', true);
        $this->forge->createTable('tb_praktik_industri');
    }

    public function down()
    {
        $this->forge->dropTable('tb_praktik_industri');
    }
}
