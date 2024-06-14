<?php
class Mawal extends CI_Model
{
    public function getTopTwoRooms()
    {
        $this->db->select('tbkamar.jenis_kamar, tbkamar.deskripsi_kamar, tbfoto.foto, COUNT(tbnokamar.id_kamar) as total_pemesanan')
            ->from('tbpemesanan')
            ->join('tbnokamar', 'tbpemesanan.no_kamar = tbnokamar.no_kamar')
            ->join('tbkamar', 'tbnokamar.id_kamar = tbkamar.id_kamar')
            ->join('tbfoto', 'tbkamar.id_kamar = tbfoto.id_foto')
            ->group_by('tbnokamar.id_kamar')
            ->order_by('total_pemesanan', 'DESC')
            ->limit(2);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function validasi()
        { 
            if($this->session->userdata('username')==''){
                echo "<script>alert('Anda tidak dapat mengakses halaman ini, Silahkan login terlebih dahulu')</script>";
                redirect('clogin/formlogin','refresh');
             }
        }
}
?>
