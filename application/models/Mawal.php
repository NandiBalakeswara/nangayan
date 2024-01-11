<?php
class Mawal extends CI_Model
{
    public function getTopTwoRooms()
    {
        $this->db->select('tbkamar.jenis_kamar, tbkamar.deskripsi_kamar, tbkamar.foto, COUNT(tbpemesanan.id_kamar) as total_pemesanan');
        $this->db->from('tbkamar');
        $this->db->join('tbpemesanan', 'tbkamar.id_kamar = tbpemesanan.id_kamar', 'left');
        $this->db->group_by('tbkamar.id_kamar');
        $this->db->order_by('total_pemesanan', 'desc');
        $this->db->limit(2);

        $query = $this->db->get();
        return $query->result();
    }
}
?>
