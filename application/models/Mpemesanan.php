<?php
	class Mpemesanan extends CI_Model
	{
		function getRoomDetails($id_kamar) {
            $query = $this->db->get_where('tbkamar', array('id_kamar' => $id_kamar));
            return $query->row();
        }

		function getidlayanan($nama_layanan)
		{
			$query = $this->db->select('id_layanan')
                  ->from('tblayanan')
                  ->where('nama_layanan', $nama_layanan)
                  ->get();

			$result = $query->row(); // Mengambil satu baris hasil

			if ($result) {
				return $id_layanan = $result->id_layanan;
				// Lakukan sesuatu dengan $id_layanan
			} else {
				$query1 = $this->db->select('id_layanan')
                  ->from('tblayanan')
                  ->where('nama_layanan', 'Tidak Menambahkan Layanan')
                  ->get();

				$result1 = $query1->row();
				// Penanganan jika tidak ada hasil yang ditemukan
				return $id_layanan = $result1->id_layanan;
			}
		}
		function getkodepembayaran(){
			$this->db->select('kode_pembayaran + 1', false) // false menghindari pelarian kutip
					->from('tbpemesanan')
					->where('id_pemesanan', '(SELECT MAX(id_pemesanan) FROM tbpemesanan)', false);

			$query = $this->db->get();
			$result = $query->row();
			return $result->{'kode_pembayaran + 1'};
			
		}
		function simpandata($data)
		{
			$this->db->insert('tbpemesanan',$data);
		}
		//roombooking2
		function getpesanan($id_pengguna){
			$subquery = $this->db->select_max('id_pemesanan')
                    ->where('id_pengguna', $id_pengguna)
                    ->get_compiled_select('tbpemesanan');

			// Query utama dengan inner join dan DATEDIFF
			$query = $this->db->select('status_pembayaran,status_pemesanan,kode_pembayaran, waktu_keluar, waktu_masuk, DATEDIFF(waktu_keluar, waktu_masuk) AS jumlah_hari, harga, harga_layanan')
							->from('tbpemesanan')
							->join('tbkamar', 'tbpemesanan.id_kamar=tbkamar.id_kamar')
							->join('tblayanan', 'tbpemesanan.id_layanan=tblayanan.id_layanan')
							->where("id_pemesanan = ($subquery)", NULL, FALSE)
							->get();
			$pemesanan = $query->row();
			
			//print_r($pemesanan);		
			return $pemesanan;			
		}
	}
?>