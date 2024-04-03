<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlbumsTable extends Migration
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
            'id_usuario'     => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'd_nombre'        => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'd_artista'      => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'd_color'       => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'd_estado'      => [
                'type'       => 'ENUM',
                'constraint' => ['En Aprobación', 'Aprobado', 'Rechazado'],
                'default'    => 'En Aprobación',
            ],
            'f_alta'  => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('albums');
    }

    public function down()
    {
        $this->forge->dropTable('albums');
    }
}
