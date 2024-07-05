<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_tbnokamar extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'no_kamar' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
            'id_kamar' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'status_ketersediaan' => array(
                'type' => 'ENUM("Tersedia","Tidak Tersedia")',
                'default' => 'Tersedia',
            ),
        ));

        // Menambahkan primary key gabungan
        $this->dbforge->add_key(array('no_kamar', 'id_kamar'), TRUE);

        // Menambahkan foreign key
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_kamar) REFERENCES tbkamar(id_kamar) ON DELETE CASCADE ON UPDATE CASCADE');

        $this->dbforge->create_table('tbnokamar');
    }

    public function down()
    {
        $this->dbforge->drop_table('tbnokamar');
    }
}
