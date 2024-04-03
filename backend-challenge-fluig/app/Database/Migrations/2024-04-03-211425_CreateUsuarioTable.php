<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'd_nombre'        => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'f_alta'  => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
