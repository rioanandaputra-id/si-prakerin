<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dsn'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_akun'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_prodi'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nip_dsn'        => ['type' => 'CHAR', 'constraint' => 20],
            'nama_dsn'       => ['type' => 'VARCHAR', 'constraint' => '150'],
            'jenkel_dsn'     => ['type' => 'ENUM("Laki-Laki", "Perempuan")'],
            'tmpt_lahir_dsn' => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'tgl_lahir_dsn'  => ['type' => 'DATE', 'null' => TRUE],
            'no_hp_dsn'      => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'alamat_dsn'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'status_dsn'     => ['type' => 'CHAR', 'constraint' => 20, 'null' => TRUE],
            'dibuat'         => ['type' => 'DATETIME', 'null' => TRUE],
            'diperbarui'   => ['type' => 'DATETIME', 'null' => TRUE],
        ]);
        $this->forge->addKey('id_dsn', TRUE);
        $this->forge->addKey(['id_akun','id_prodi'], FALSE);
        // $this->forge->addForeignKey('id_prodi', 'tb_program_studi', 'id_prodi', '', 'CASCADE');
        // $this->forge->addForeignKey('id_akun', 'users', 'id_akun', '', 'CASCADE');
        $this->forge->createTable('tb_dosen');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dosen');
    }
}
