<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama_mahasiswa'          => ['type' => 'VARCHAR', 'constraint' => '150'],
            'jenkel_mahasiswa'        => ['type' => 'ENUM("Laki-Laki", "Perempuan")'],
            'tmpt_lahir_mahasiswa'    => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'tgl_lahir_mahasiswa'     => ['type' => 'DATE', 'null' => TRUE],
            'email_mahasiswa'         => ['type' => 'CHAR', 'constraint' => '150', 'null' => TRUE],
            'no_hp_mahasiswa'         => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'alamat_mahasiswa'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'nama_ortua'        => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'no_hp_ortua'       => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'nim_mahasiswa'           => ['type' => 'CHAR', 'constraint' => 20],
            'id_mahasiswa'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_tahun_akademik'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_akun'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_prodi'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id_mahasiswa', TRUE);
        $this->forge->addKey(['id_tahun_akademik', 'id_prodi', 'id_akun'], FALSE);
        $this->forge->createTable('tb_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_mahasiswa');
    }
}
