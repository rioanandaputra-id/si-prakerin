<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mhs'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_thn_akademik'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_akun'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_prodi'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nim_mhs'           => ['type' => 'CHAR', 'constraint' => 20],
            'nama_mhs'          => ['type' => 'VARCHAR', 'constraint' => '150'],
            'jenkel_mhs'        => ['type' => 'ENUM("Laki-Laki", "Perempuan")'],
            'tmpt_lahir_mhs'    => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'tgl_lahir_mhs'     => ['type' => 'DATE', 'null' => TRUE],
            'no_hp_mhs'         => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'alamat_mhs'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'status_mhs'        => ['type' => 'CHAR', 'constraint' => 20, 'null' => TRUE],
            'nama_ortua'        => ['type' => 'VARCHAR', 'constraint' => '150'],
            'no_hp_ortua'       => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'dibuat'            => ['type' => 'DATETIME', 'null' => TRUE],
            'diperbaharui'      => ['type' => 'DATETIME', 'null' => TRUE],
        ]);
        $this->forge->addKey('id_mhs', TRUE);
        $this->forge->addKey(['id_thn_akademik','id_prodi','id_akun'], FALSE);
        // $this->forge->addForeignKey('id_thn_akademik', 'tb_tahun_akademik', 'id_thn_akademik', '', 'CASCADE');
        // $this->forge->addForeignKey('id_prodi', 'tb_program_studi', 'id_prodi', '', 'CASCADE');
        // $this->forge->addForeignKey('id_akun', 'users', 'id_akun', '', 'CASCADE');
        $this->forge->createTable('tb_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_mahasiswa');
    }
}
