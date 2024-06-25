<?php
class Madmin extends CI_Model
{

    public function tampildatapemesan()
    {
        $this->db->select('tbpemesanan.*, tbpengguna.nama_lengkap, tbkamar.jenis_kamar, tbkamar.harga, tblayanan.nama_layanan, tblayanan.harga_layanan, DATEDIFF(waktu_keluar, waktu_masuk) AS jumlah_hari');
        $this->db->from('tbpemesanan');
        $this->db->join('tbpengguna', 'tbpengguna.id_pengguna = tbpemesanan.id_pengguna');
        $this->db->join('tbkamar', 'tbkamar.id_kamar = tbpemesanan.id_kamar');
        $this->db->join('tblayanan', 'tblayanan.id_layanan = tbpemesanan.id_layanan');
        $this->db->group_by('tbpengguna.id_pengguna, tbkamar.id_kamar, tblayanan.id_layanan, waktu_masuk, waktu_keluar');
        $this->db->order_by('tbpemesanan.id_pemesanan', 'asc');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $pesan) {
            $key = $pesan->id_pengguna . '_' . $pesan->id_kamar . '_' . $pesan->id_layanan . '_' . $pesan->waktu_masuk . '_' . $pesan->waktu_keluar;

            // Mengganti data jika sudah ada kunci yang sama
            if (isset($result[$key])) {
                $result[$key]->total_pembayaran = 0;
                $result[$key]->jumlah_pesanan = 0;
            }

            // Menghitung total pembayaran dan jumlah pesanan
            $pesan->total_pembayaran = ($pesan->harga + $pesan->harga_layanan) * $pesan->jumlah_hari;
            $pesan->jumlah_pesanan = $pesan->jumlah_pesanan;

            // Menyimpan data ke dalam array hasil
            $result[$key] = $pesan;
        }

        // Menghapus kunci yang dihasilkan untuk mengembalikan array nilai numerik
        $result = array_values($result);

        return $result;
    }


    public function updateDataPemesanan($id_pemesanan, $id_pengguna, $id_kamar, $id_layanan, $status_pemesanan, $status_pembayaran, $kode_pembayaran, $nomor_kamar)
    {
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

    public function hapusDataPemesanan($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->delete('tbpemesanan');
    }
}
