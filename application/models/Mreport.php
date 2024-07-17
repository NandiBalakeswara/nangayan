<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mreport extends CI_Model
{

    public function datareport()
    {
        // Query to get the summary report using Query Builder
        $this->db->select("EXTRACT(MONTH FROM waktu_masuk) AS bulan, EXTRACT(YEAR FROM waktu_masuk) AS tahun, jenis_kamar, COUNT(tbpemesanan.id_pemesanan) AS jumlah_pemesanan, SUM(harga) AS total_harga");
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
        $this->db->where('status_pemesanan', 'Tervalidasi');
        $this->db->group_by(['bulan', 'tahun', 'jenis_kamar']);
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('bulan', 'DESC');
        $query = $this->db->get();

        $results = $query->result();

        // Processing the results to get the room type with the highest bookings per month and year
        $processed_results = [];
        foreach ($results as $row) {
            $key = $row->bulan . '-' . $row->tahun;
            if (!isset($processed_results[$key])) {
                $processed_results[$key] = [
                    'bulan' => $row->bulan,
                    'tahun' => $row->tahun,
                    'jenis_kamar' => $row->jenis_kamar,
                    'jumlah_pemesanan' => $row->jumlah_pemesanan,
                    'pendapatan' => $row->total_harga
                ];
            } else {
                if ($row->jumlah_pemesanan > $processed_results[$key]['jumlah_pemesanan']) {
                    $processed_results[$key] = [
                        'bulan' => $row->bulan,
                        'tahun' => $row->tahun,
                        'jenis_kamar' => $row->jenis_kamar,
                        'jumlah_pemesanan' => $row->jumlah_pemesanan,
                        'pendapatan' => $row->total_harga
                    ];
                }
            }
        }

        return $processed_results;
    }

    public function searchReport($criteria)
    {
        // Build the query using Query Builder with the provided criteria
        $this->db->select("EXTRACT(MONTH FROM waktu_masuk) AS bulan, EXTRACT(YEAR FROM waktu_masuk) AS tahun, jenis_kamar, COUNT(tbpemesanan.id_pemesanan) AS jumlah_pemesanan, SUM(harga) AS total_harga");
        $this->db->from('tbpemesanan');
        $this->db->join('tbkamar', 'tbpemesanan.id_kamar = tbkamar.id_kamar');
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
        if (!empty($criteria['jumlah_pesanan'])) {
            $this->db->having('jumlah_pemesanan >=', $criteria['jumlah_pesanan']);
        }
        if (!empty($criteria['pendapatan'])) {
            $this->db->having('total_harga >=', $criteria['pendapatan']);
        }

        $this->db->group_by(['bulan', 'tahun', 'jenis_kamar']);
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('bulan', 'DESC');
        $query = $this->db->get();

        $results = $query->result();

        // Processing the results to get the room type with the highest bookings per month and year
        $processed_results = [];
        foreach ($results as $row) {
            $key = $row->bulan . '-' . $row->tahun;
            if (!isset($processed_results[$key])) {
                $processed_results[$key] = [
                    'bulan' => $row->bulan,
                    'tahun' => $row->tahun,
                    'jenis_kamar' => $row->jenis_kamar,
                    'jumlah_pemesanan' => $row->jumlah_pemesanan,
                    'pendapatan' => $row->total_harga
                ];
            } else {
                if ($row->jumlah_pemesanan > $processed_results[$key]['jumlah_pemesanan']) {
                    $processed_results[$key] = [
                        'bulan' => $row->bulan,
                        'tahun' => $row->tahun,
                        'jenis_kamar' => $row->jenis_kamar,
                        'jumlah_pemesanan' => $row->jumlah_pemesanan,
                        'pendapatan' => $row->total_harga
                    ];
                }
            }
        }

        return $processed_results;
    }
}
