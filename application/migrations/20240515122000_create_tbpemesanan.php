<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_tbpemesanan extends CI_Migration
{
    public function up()
    {
        // Tabel tbpemesanan
        $this->dbforge->add_field(array(
            'id_pemesanan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'waktu_masuk' => array(
                'type' => 'DATETIME',
            ),
            'waktu_keluar' => array(
                'type' => 'DATETIME',
            ),
            'status_pembayaran' => array(
                'type' => 'ENUM("Tervalidasi","Belum Tervalidasi")',
                'default' => 'Belum Tervalidasi',
            ),
            'status_pemesanan' => array(
                'type' => 'ENUM("Tervalidasi","Belum Tervalidasi")',
                'default' => 'Belum Tervalidasi',
            ),
            'id_pengguna' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'id_layanan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'no_kamar' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
            'kode_pembayaran' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
            'id_kamar' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'jumlah_pesanan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            )
        ));
        $this->dbforge->add_key('id_pemesanan', TRUE);
        $this->dbforge->create_table('tbpemesanan');

        // Tambahkan foreign key dengan SQL query
        $sql = "ALTER TABLE `tbpemesanan`
                ADD CONSTRAINT `fk_pemesanan_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tbpengguna`(`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_pemesanan_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `tblayanan`(`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_pemesanan_nokamar` FOREIGN KEY (`no_kamar`) REFERENCES `tbnokamar`(`no_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_pemesanan_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `tbkamar`(`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;";
        $this->db->query($sql);
    }

    public function down()
    {
        $this->dbforge->drop_table('tbpemesanan');
    }
}
