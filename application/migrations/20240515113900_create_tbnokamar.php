<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tbnokamar extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'no_kamar' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                // 'unique' => TRUE, 
               
            ),
            'id_kamar' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            
        ));
        $this->dbforge->add_key('no_kamar', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_kamar) REFERENCES tbkamar(id_kamar) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('tbnokamar');

       
    }

    public function down()
    {
        $this->dbforge->drop_table('tbnokamar');
    }
}
