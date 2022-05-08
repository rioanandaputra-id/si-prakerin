<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'status'          => ['type' => 'VARCHAR', 'constraint' => '150'],
        ]);

        $this->forge->addKey('id_status', TRUE);
        $this->forge->createTable('tb_status');
    }

    public function down()
    {
        $this->forge->dropTable('tb_status');
    }
}
