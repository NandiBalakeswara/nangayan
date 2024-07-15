<?php
class Mawal extends CI_Model
{
    public function getTopTwoRooms()
    {
        $query = $this->db
            ->select('tbkamar.jenis_kamar, tbkamar.deskripsi_kamar, tbfoto.foto')
            ->from('tbpemesanan')
            ->join('tbpemesanan_detail', 'tbpemesanan.id_pemesanan = tbpemesanan_detail.id_pemesanan')
            ->join('tbnokamar', 'tbpemesanan_detail.no_kamar = tbnokamar.no_kamar')
            ->join('tbkamar', 'tbnokamar.id_kamar = tbkamar.id_kamar')
            ->join('tbfoto', 'tbkamar.id_kamar = tbfoto.id_kamar')
            ->group_by('tbkamar.id_kamar')
            ->order_by('COUNT(tbpemesanan.id_pemesanan)', 'DESC')
            ->limit(2)
            ->get();

        return $query->result();
    }

    function validasi()
    {
        if ($this->session->userdata('username') == '') {
            echo "<script>alert('Anda tidak dapat mengakses halaman ini, Silahkan login terlebih dahulu')</script>";
            redirect('clogin/formlogin', 'refresh');
        }
    }
}
