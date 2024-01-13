<?php
class Mstatus extends CI_Model
{
    public function getBookingData($id_pengguna)
    {
        $this->db->select('tbpengguna.nama_lengkap, tbpengguna.username, tbpengguna.nomor_hp, tblayanan.nama_layanan, tblayanan.harga_layanan, tbkamar.jenis_kamar, tbkamar.foto, tbpemesanan.waktu_masuk, tbpemesanan.waktu_keluar, tbkamar.harga, tbpemesanan.nomor_kamar, tbpemesanan.status_pemesanan, tbpemesanan.status_pembayaran');
        $this->db->from('tbpemesanan');
        $this->db->join('tbpengguna', 'tbpengguna.id_pengguna = tbpemesanan.id_pengguna');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->join('tblayanan', 'tbpemesanan.id_layanan = tblayanan.id_layanan');
        $this->db->where('tbpemesanan.id_pengguna', $id_pengguna);

        $query = $this->db->get();
        $result = $query->row();
        
        return $result;
    }

}
?>
