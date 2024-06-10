<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tbkamar extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_kamar' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'jenis_kamar' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
            ),
            'deskripsi_kamar' => array(
                'type' => 'TEXT',
            ),
            'harga' => array(
                'type' => 'FLOAT',
                
            ),
        ));
        $this->dbforge->add_key('id_kamar', TRUE);
        $this->dbforge->create_table('tbkamar');

       
    }

    public function down()
    {
        $this->dbforge->drop_table('tbkamar');
    }
}
