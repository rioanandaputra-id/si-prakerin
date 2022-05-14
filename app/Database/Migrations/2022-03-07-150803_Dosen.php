<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama_dosen'       => ['type' => 'VARCHAR', 'constraint' => '150'],
            'jenkel_dosen'     => ['type' => 'ENUM("Laki-Laki", "Perempuan")'],
            'tmpt_lahir_dosen' => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'tgl_lahir_dosen'  => ['type' => 'DATE', 'null' => TRUE],
            'email_dosen'      => ['type' => 'CHAR', 'constraint' => '150', 'null' => TRUE],
            'no_hp_dosen'      => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'alamat_dosen'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'nip_dosen'        => ['type' => 'CHAR', 'constraint' => 20],
            'id_dosen'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_akun'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_prodi'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null'           => TRUE],
        ]);
        $this->forge->addKey('id_dosen', TRUE);
        $this->forge->addKey(['id_akun', 'id_prodi'], FALSE);
        $this->forge->createTable('tb_dosen');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dosen');
    }
}
