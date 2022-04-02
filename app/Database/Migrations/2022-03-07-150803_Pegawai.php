<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_akun'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_prodi'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null'           => TRUE,],
            'nip_pegawai'        => ['type' => 'CHAR', 'constraint' => 20],
            'nama_pegawai'       => ['type' => 'VARCHAR', 'constraint' => '150'],
            'jenkel_pegawai'     => ['type' => 'ENUM("Laki-Laki", "Perempuan")'],
            'tmpt_lahir_pegawai' => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'tgl_lahir_pegawai'  => ['type' => 'DATE', 'null' => TRUE],
            'no_hp_pegawai'      => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'alamat_pegawai'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'status_pegawai'     => ['type' => 'CHAR', 'constraint' => 20],
            // 'pegawai_dibuat'           => [
            //     'type'           => 'DATETIME',
            // ],
            // 'pegawai_diubah'       => [
            //     'type'           => 'DATETIME',
            //     'null'           => TRUE,
            // ],
            // 'id_pembuat_pegawai'         => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            // ],
            // 'id_pengubah_pegawai'        => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            //     'null'           => TRUE
            // ],
        ]);
        $this->forge->addKey('id_pegawai', TRUE);
        $this->forge->addKey(['id_akun', 'id_prodi'], FALSE);
        // $this->forge->addForeignKey('id_prodi', 'tb_program_studi', 'id_prodi', '', 'CASCADE');
        // $this->forge->addForeignKey('id_akun', 'users', 'id_akun', '', 'CASCADE');
        $this->forge->createTable('tb_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pegawai');
    }
}
