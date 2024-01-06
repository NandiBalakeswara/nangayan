<?php
    class Madmin extends CI_Model {
        
        public function tampildatapemesan() {
            $this->db->select('tbpemesanan.*, tbpengguna.nama_lengkap, tbkamar.jenis_kamar, tblayanan.nama_layanan');
            $this->db->from('tbpemesanan');
            $this->db->join('tbpengguna', 'tbpengguna.id_pengguna = tbpemesanan.id_pengguna');
            $this->db->join('tbkamar', 'tbkamar.id_kamar = tbpemesanan.id_kamar');
            $this->db->join('tblayanan', 'tblayanan.id_layanan = tbpemesanan.id_layanan');
            $query = $this->db->get();
            return $query->result();
        }

        public function updateDataPemesanan($id_pemesanan, $id_pengguna, $id_kamar, $id_layanan, $status_pemesanan, $status_pembayaran, $kode_pembayaran, $nomor_kamar){
            $data = array(
                'id_pengguna' => $id_pengguna,
                'id_kamar' => $id_kamar,
                'id_layanan' => $id_layanan,
                'status_pemesanan' => $status_pemesanan,
                'status_pembayaran' => $status_pembayaran,
                'kode_pembayaran' => $kode_pembayaran,
                'nomor_kamar' => $nomor_kamar
            );
        
            $this->db->where('id_pemesanan', $id_pemesanan);
            $this->db->update('tbpemesanan', $data);
        }

        public function hapusDataPemesanan($id_pemesanan){
            $this->db->where('id_pemesanan', $id_pemesanan);
            $this->db->delete('tbpemesanan');
        }
        
        
    }
?>
