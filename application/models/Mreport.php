<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mreport extends CI_Model {

    public function datareport() {
        $query = $this->db->query("
        SELECT
            EXTRACT(MONTH FROM waktu_masuk) AS bulan,
            EXTRACT(YEAR FROM waktu_masuk) AS tahun,
            jenis_kamar,
            COUNT(id_pemesanan) AS jumlah_pemesanan,
            SUM(harga) AS total_harga,
            SUM(harga * (SELECT COUNT(id_pemesanan) FROM tbpemesanan WHERE tbpemesanan.id_kamar = tbkamar.id_kamar)) AS pendapatan
        FROM
            tbpemesanan
        JOIN
            tbkamar ON tbpemesanan.id_kamar = tbkamar.id_kamar
        WHERE
            status_pemesanan = 'Tervalidasi'
        GROUP BY
            bulan, tahun, jenis_kamar
        ORDER BY
            tahun DESC, bulan DESC, jenis_kamar
        ");

        //echo $this->db->last_query();

        return $query->result();
    }

}
