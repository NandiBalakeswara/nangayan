<?php
class Mpemesanan extends CI_Model
{
	function getRoomDetails($id_kamar)
	{
		$query = $this->db->get_where('tbkamar', array('id_kamar' => $id_kamar));
		return $query->row();
	}

	function getFirstPhoto($id_kamar)
	{
		$query = $this->db->select('foto')
			->from('tbfoto')
			->where('id_kamar', $id_kamar)
			->order_by('id_foto', 'asc')
			->limit(1)
			->get();
		return $query->row();
	}

	function getkodepembayaran()
	{
		$this->db->select('MAX(kode_pembayaran) + 1 AS next_kode_pembayaran', FALSE);
		$query = $this->db->get('tbpemesanan');
		$result = $query->row();

		if ($result) {
			return $result->next_kode_pembayaran ?? 1;
		} else {
			return 1;
		}
	}

	function simpandata($data)
	{
		// Prepare data for tbpemesanan
		$pemesanan_data = array(
			'id_pengguna' => $data['id_pengguna'],
			'id_kamar' => $data['id_kamar'],
			'id_layanan' => $data['id_layanan'],
			'waktu_masuk' => $data['waktu_masuk'],
			'waktu_keluar' => $data['waktu_keluar'],
			'jumlah_pesanan' => $data['jumlah_pesanan'],
			'kode_pembayaran' => $this->getkodepembayaran(),
			'status_pembayaran' => 'Belum Tervalidasi',
			'status_pemesanan' => 'Belum Tervalidasi'
		);

		// Insert into tbpemesanan
		$this->db->insert('tbpemesanan', $pemesanan_data);
		$id_pemesanan = $this->db->insert_id();

		// Prepare data for tbpemesanan_detail
		$pemesanan_detail_data = array();
		$no_kamar_tersedia = $this->getKamarTersedia($data['id_kamar'], $data['jumlah_pesanan']);

		if (!$no_kamar_tersedia) {
			return false; // Handle ketersediaan kamar tidak mencukupi
		}

		foreach ($no_kamar_tersedia as $kamar_tersedia) {
			$pemesanan_detail_data[] = array(
				'id_pemesanan' => $id_pemesanan,
				'no_kamar' => $kamar_tersedia->no_kamar
			);
		}

		// Insert into tbpemesanan_detail
		$this->db->insert_batch('tbpemesanan_detail', $pemesanan_detail_data);

		$this->db->set('status_pemesanan', 'Tervalidasi');
		$this->db->where('id_pemesanan', $id_pemesanan);
		$this->db->update('tbpemesanan');

		$jumlah_pesanan = $this->input->post('jumlah_pesanan');

		// Periksa ketersediaan kamar yang cukup
		$this->db->where('id_kamar', $data['id_kamar']);
		$this->db->where('status_ketersediaan', 'Tersedia');
		$kamar_tersedia = $this->db->count_all_results('tbnokamar');

		if ($kamar_tersedia >= $jumlah_pesanan) {
			// Perbarui ketersediaan kamar
			for ($i = 0; $i < $jumlah_pesanan; $i++) {
				$this->db->set('status_ketersediaan', 'Tidak Tersedia');
				$this->db->where('id_kamar', $data['id_kamar']);
				$this->db->where('status_ketersediaan', 'Tersedia');
				$this->db->limit(1);
				$this->db->update('tbnokamar');
			}
		} else {
			// Tangani ketersediaan kamar yang tidak mencukupi (misalnya, tampilkan pesan error)
			return false;
		}

		return true;

		return true;
	}

	function getKamarTersedia($id_kamar, $jumlah_pesanan)
	{
		$this->db->select('no_kamar')
			->where('id_kamar', $id_kamar)
			->where('status_ketersediaan', 'Tersedia')
			->limit($jumlah_pesanan);
		return $this->db->get('tbnokamar')->result();
	}


	function getpesanan($id_pengguna)
	{
		$query = $this->db->select('status_pembayaran, status_pemesanan, kode_pembayaran, waktu_keluar, waktu_masuk, DATEDIFF(waktu_keluar, waktu_masuk) AS jumlah_hari, harga, harga_layanan, jumlah_pesanan, jenis_kamar, nama_layanan, nama_lengkap, username, nomor_hp')
			->from('tbpemesanan')
			->join('tbkamar', 'tbpemesanan.id_kamar=tbkamar.id_kamar')
			->join('tblayanan', 'tbpemesanan.id_layanan=tblayanan.id_layanan')
			->join('tbpengguna', 'tbpemesanan.id_pengguna=tbpengguna.id_pengguna')
			->where('tbpengguna.id_pengguna', $id_pengguna)
			->get();
		return $query->result();
	}

	// Mendapatkan pemesanan yang telah berakhir
	public function get_expired_reservations()
	{
		$this->db->select('tbpemesanan_detail.no_kamar, tbpemesanan.id_kamar');
		$this->db->from('tbpemesanan');
		$this->db->join('tbpemesanan_detail', 'tbpemesanan.id_pemesanan = tbpemesanan_detail.id_pemesanan');
		$this->db->where('tbpemesanan.waktu_keluar <', date('Y-m-d H:i:s'));
		$this->db->where('tbpemesanan.status_pemesanan', 'Tervalidasi');
		$query = $this->db->get();
		return $query->result();
	}

	// Mengubah status kamar menjadi Tersedia
	public function update_room_availability($no_kamar, $id_kamar)
	{
		$this->db->set('status_ketersediaan', 'Tersedia');
		$this->db->where('no_kamar', $no_kamar);
		$this->db->where('id_kamar', $id_kamar);
		$this->db->update('tbnokamar');
	}

	// Memperbarui status kamar yang telah berakhir
	public function update_expired_reservations()
	{
		$expired_reservations = $this->get_expired_reservations();
		foreach ($expired_reservations as $reservation) {
			$this->update_room_availability($reservation->no_kamar, $reservation->id_kamar);
		}
	}

	public function updateStatusPembayaran($id_pengguna)
	{
		$this->db->set('status_pembayaran', 'Tervalidasi');
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tbpemesanan');
	}
	public function checkRoomAvailability($id_kamar)
	{
		$this->db->where('id_kamar', $id_kamar);
		$this->db->where('status_ketersediaan', 'Tersedia');
		$query = $this->db->get('tbnokamar');

		return $query->num_rows() > 0;
	}

	public function getAvailableRoomsCount($id_kamar)
	{
		$this->db->where('id_kamar', $id_kamar);
		$this->db->where('status_ketersediaan', 'Tersedia');
		$query = $this->db->get('tbnokamar');

		return $query->num_rows();
	}
}
