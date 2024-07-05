<?php
class Mstatus extends CI_Model
{
    public function getBookingData($id_pengguna)
    {
        $this->db->select('tbpengguna.nama_lengkap, tbpengguna.username, tbpengguna.nomor_hp, tblayanan.nama_layanan, tblayanan.harga_layanan, tbkamar.jenis_kamar, tbfoto.foto, tbpemesanan.waktu_masuk, tbpemesanan.waktu_keluar, tbkamar.harga, tbpemesanan.status_pemesanan, tbpemesanan.status_pembayaran, DATEDIFF(waktu_keluar, waktu_masuk) AS jumlah_hari, GROUP_CONCAT(tbpemesanan_detail.no_kamar) as nomor_kamar');
        $this->db->from('tbpemesanan');
        $this->db->join('tbpengguna', 'tbpengguna.id_pengguna = tbpemesanan.id_pengguna');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->join('tblayanan', 'tbpemesanan.id_layanan = tblayanan.id_layanan');
        $this->db->join('tbfoto', 'tbfoto.id_kamar = tbkamar.id_kamar', 'left');
        $this->db->join('tbpemesanan_detail', 'tbpemesanan_detail.id_pemesanan = tbpemesanan.id_pemesanan', 'left');
        $this->db->where('tbpemesanan.id_pengguna', $id_pengguna);
        $this->db->group_by('tbpemesanan.id_pemesanan');
        $this->db->limit(3);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function getRoomNumbers($id_pengguna)
    {
        $this->db->select('tbpemesanan_detail.no_kamar');
        $this->db->from('tbpemesanan_detail');
        $this->db->join('tbpemesanan', 'tbpemesanan.id_pemesanan = tbpemesanan_detail.id_pemesanan');
        $this->db->where('tbpemesanan.id_pengguna', $id_pengguna);
        $this->db->distinct();
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
}
