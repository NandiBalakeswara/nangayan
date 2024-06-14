<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tbpengguna extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_pengguna' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_lengkap' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
            'jenis_kelamin' => array(
                'type' => 'ENUM("None","Laki-laki","Perempuan")',
                'default' => 'None',
            ),
            'nomor_hp' => array(
                'type' => 'CHAR',
                'constraint' => '15',
            ),
            
            'level' => array(
                'type' => 'ENUM("Admin","Pengguna")',
                'default' => 'Pengguna',
            ),
        ));

        $this->dbforge->add_key('id_pengguna', TRUE);
        $this->dbforge->create_table('tbpengguna');

       
    }

    public function down()
    {
        $this->dbforge->drop_table('tblayanan');
    }
}
