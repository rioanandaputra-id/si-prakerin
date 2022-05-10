<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PraktikIndustriNilai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nilai_praktik_industri' => [
                'type' => 'FLOAT',
            ],
            'id_praktik_industri_nilai' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'id_praktik_industri' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
        ]);
        $this->forge->addKey('id_praktik_industri_nilai', true);
        $this->forge->createTable('tb_praktik_industri_nilai');
    }

    public function down()
    {
        $this->forge->dropTable('tb_praktik_industri_nilai');
    }
}
