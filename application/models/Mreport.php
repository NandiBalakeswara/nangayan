<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mreport extends CI_Model
{
    public function datareport()
    {
        // Query to get the summary report including services
        $this->db->select("
            EXTRACT(MONTH FROM waktu_masuk) AS bulan, 
            EXTRACT(YEAR FROM waktu_masuk) AS tahun, 
            jenis_kamar, 
            nama_layanan, 
            jumlah_pesanan AS jumlah_pemesanan, 
            SUM(tbkamar.harga + IFNULL(tblayanan.harga_layanan, 0)) AS total_harga
        ");
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->join('tblayanan', 'tbpemesanan.id_layanan = tblayanan.id_layanan', 'left');
        $this->db->where('status_pemesanan', 'Tervalidasi');
        $this->db->group_by(['bulan', 'tahun', 'jenis_kamar', 'nama_layanan']);
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('bulan', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function searchReport($criteria)
    {
        // Build the query using Query Builder with the provided criteria
        $this->db->select("
            EXTRACT(MONTH FROM waktu_masuk) AS bulan, 
            EXTRACT(YEAR FROM waktu_masuk) AS tahun, 
            jenis_kamar, 
            nama_layanan, 
            jumlah_pesanan AS jumlah_pemesanan, 
            SUM(tbkamar.harga + IFNULL(tblayanan.harga_layanan, 0)) AS total_harga
        ");
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->join('tblayanan', 'tbpemesanan.id_layanan = tblayanan.id_layanan', 'left');
        $this->db->where('status_pemesanan', 'Tervalidasi');

        // Apply filters based on criteria
        if (!empty($criteria['bulan'])) {
            $this->db->where('EXTRACT(MONTH FROM waktu_masuk) =', $criteria['bulan']);
        }
        if (!empty($criteria['tahun'])) {
            $this->db->where('EXTRACT(YEAR FROM waktu_masuk) =', $criteria['tahun']);
        }
        if (!empty($criteria['jenis_kamar'])) {
            $this->db->where('jenis_kamar', $criteria['jenis_kamar']);
        }
        if (!empty($criteria['nama_layanan'])) {
            $this->db->where('nama_layanan', $criteria['nama_layanan']);
        }

        $this->db->group_by(['bulan', 'tahun', 'jenis_kamar', 'nama_layanan']);
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('bulan', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function getTotalPendapatan($criteria = [])
    {
        $this->db->select("SUM(tbkamar.harga + IFNULL(tblayanan.harga_layanan, 0)) AS total_pendapatan");
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->join('tblayanan', 'tbpemesanan.id_layanan = tblayanan.id_layanan', 'left');
        $this->db->where('tbpemesanan.status_pemesanan', 'Tervalidasi');

        // Apply filters based on criteria
        if (!empty($criteria['bulan'])) {
            $this->db->where('EXTRACT(MONTH FROM waktu_masuk) =', $criteria['bulan']);
        }
        if (!empty($criteria['tahun'])) {
            $this->db->where('EXTRACT(YEAR FROM waktu_masuk) =', $criteria['tahun']);
        }
        if (!empty($criteria['jenis_kamar'])) {
            $this->db->where('jenis_kamar', $criteria['jenis_kamar']);
        }
        if (!empty($criteria['nama_layanan'])) {
            $this->db->where('nama_layanan', $criteria['nama_layanan']);
        }

        $query = $this->db->get();
        return $query->row()->total_pendapatan;
    }

    public function getAllJenisKamar()
    {
        $this->db->select('jenis_kamar');
        $this->db->from('tbkamar');
        $query = $this->db->get();
        return $query->result();
    }
}
