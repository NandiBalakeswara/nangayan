<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tblayanan extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_layanan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_layanan' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
            ),
            'deskripsi_layanan' => array(
                'type' => 'TEXT',
            ),
            'harga_layanan' => array(
                'type' => 'FLOAT',
                
            ),
        ));
        $this->dbforge->add_key('id_layanan', TRUE);
        $this->dbforge->create_table('tblayanan');

       
    }

    public function down()
    {
        $this->dbforge->drop_table('tblayanan');
    }
}
