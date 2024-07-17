<?php

class Madmind extends CI_Model
{
    public function chart_database()
    {
        $this->db->select(
            'jenis_kamar, COUNT(id_pemesanan) AS jumlah_pemesanan, 
                SUM(harga) AS total_harga, 
                SUM(harga * (SELECT COUNT(id_pemesanan) FROM tbpemesanan 
                WHERE tbpemesanan.id_kamar = tbkamar.id_kamar AND YEAR(waktu_masuk) = YEAR(CURDATE()))) AS pendapatan'
        );
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->where('status_pemesanan', 'Tervalidasi');
        $this->db->where('YEAR(waktu_masuk)', 'YEAR(CURDATE())', FALSE);
        $this->db->group_by('jenis_kamar');
        $this->db->order_by('jenis_kamar');

        $query = $this->db->get();

        return $query->result();
    }
}
