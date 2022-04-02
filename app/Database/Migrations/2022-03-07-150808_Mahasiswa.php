<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_tahun_akademik'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_akun'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_prodi'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nim_mahasiswa'           => ['type' => 'CHAR', 'constraint' => 20],
            'nama_mahasiswa'          => ['type' => 'VARCHAR', 'constraint' => '150'],
            'jenkel_mahasiswa'        => ['type' => 'ENUM("Laki-Laki", "Perempuan")'],
            'tmpt_lahir_mahasiswa'    => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'tgl_lahir_mahasiswa'     => ['type' => 'DATE', 'null' => TRUE],
            'no_hp_mahasiswa'         => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'alamat_mahasiswa'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'nama_ortua'        => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE],
            'no_hp_ortua'       => ['type' => 'CHAR', 'constraint' => '20', 'null' => TRUE],
            'status_mahasiswa'        => ['type' => 'CHAR', 'constraint' => 20],
            // 'mahasiswa_dibuat'           => [
            //     'type'           => 'DATETIME',
            // ],
            // 'mahasiswa_diubah'       => [
            //     'type'           => 'DATETIME',
            //     'null'           => TRUE,
            // ],
            // 'id_pembuat_mahasiswa'         => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            // ],
            // 'id_pengubah_mahasiswa'        => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE,
            //     'null'           => TRUE
            // ],
        ]);
        $this->forge->addKey('id_mahasiswa', TRUE);
        $this->forge->addKey(['id_tahun_akademik','id_prodi','id_akun'], FALSE);
        // $this->forge->addForeignKey('id_tahun_akademik', 'tb_tahun_akademik', 'id_tahun_akademik', '', 'CASCADE');
        // $this->forge->addForeignKey('id_prodi', 'tb_program_studi', 'id_prodi', '', 'CASCADE');
        // $this->forge->addForeignKey('id_akun', 'users', 'id_akun', '', 'CASCADE');
        $this->forge->createTable('tb_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_mahasiswa');
    }
}
