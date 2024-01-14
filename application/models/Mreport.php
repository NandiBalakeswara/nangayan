<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mreport extends CI_Model {

    public function datareport() {
        $this->db->select("
            EXTRACT(MONTH FROM waktu_masuk) AS bulan,
            EXTRACT(YEAR FROM waktu_masuk) AS tahun,
            jenis_kamar,
            COUNT(id_pemesanan) AS jumlah_pemesanan,
            SUM(harga) AS total_harga,
            SUM(harga * (
                SELECT COUNT(id_pemesanan)
                FROM tbpemesanan
                WHERE tbpemesanan.id_kamar = tbkamar.id_kamar
            )) AS pendapatan
        ");
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->where('status_pemesanan', 'Tervalidasi');
        $this->db->group_by('bulan, tahun, jenis_kamar');
        $this->db->order_by('tahun DESC, bulan DESC, jenis_kamar');
    
        $query = $this->db->get();
    
        // echo $this->db->last_query();
    
        return $query->result();
    }
    

}
