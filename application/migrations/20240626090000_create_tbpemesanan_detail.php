<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_tbpemesanan_detail extends CI_Migration
{
    public function up()
    {
        // Tabel tbpemesanan_detail
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_pemesanan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'no_kamar' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbpemesanan_detail');

        // Menambahkan foreign key constraint
        $this->db->query('ALTER TABLE `tbpemesanan_detail` ADD CONSTRAINT `fk_pemesanan_detail_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbpemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->db->query('ALTER TABLE `tbpemesanan_detail` ADD CONSTRAINT `fk_pemesanan_detail_nokamar` FOREIGN KEY (`no_kamar`) REFERENCES `tbnokamar` (`no_kamar`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('tbpemesanan_detail');
    }
}
