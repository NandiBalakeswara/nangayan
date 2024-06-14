<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tbfoto extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_foto' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE, 
            ),
            'foto' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_foto) REFERENCES tbkamar(id_kamar) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('tbfoto');
    }

    public function down()
    {
        $this->dbforge->drop_table('tbfoto');
    }
}
