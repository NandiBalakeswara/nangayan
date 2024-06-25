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
		$key = array(
			'id_pengguna' => $data['id_pengguna'],
			'id_kamar' => $data['id_kamar'],
			'id_layanan' => $data['id_layanan'],
			'waktu_masuk' => $data['waktu_masuk'],
			'waktu_keluar' => $data['waktu_keluar']
		);

		$existing = $this->db->get_where('tbpemesanan', $key)->row();

		if ($existing) {
			// Update existing record
			$this->db->where($key);
			$this->db->update('tbpemesanan', $data);
		} else {
			// Insert new record
			$this->db->insert('tbpemesanan', $data);
		}
	}

	function getpesanan($id_pengguna)
	{
		$query = $this->db->select('status_pembayaran, status_pemesanan, kode_pembayaran, waktu_keluar, waktu_masuk, DATEDIFF(waktu_keluar, waktu_masuk) AS jumlah_hari, harga, harga_layanan, jumlah_pesanan, jenis_kamar')
			->from('tbpemesanan')
			->join('tbkamar', 'tbpemesanan.id_kamar=tbkamar.id_kamar')
			->join('tblayanan', 'tbpemesanan.id_layanan=tblayanan.id_layanan')
			->where('id_pengguna', $id_pengguna)
			->get();
		return $query->result();
	}
}
