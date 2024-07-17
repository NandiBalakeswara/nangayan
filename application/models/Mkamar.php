<?php
class Mkamar extends CI_Model
{
	function simpandata($data, $fotos)
	{
		if ($data['id_kamar'] == "") {
			// simpan
			$this->db->insert('tbkamar', $data);
			$id_kamar = $this->db->insert_id();
			foreach ($fotos as $foto) {
				$this->db->insert('tbfoto', array('id_kamar' => $id_kamar, 'foto' => $foto));
			}
		} else {
			// edit
			$id_kamar = $data['id_kamar'];
			$this->db->where('id_kamar', $id_kamar);
			$this->db->update('tbkamar', $data);
			$this->db->where('id_kamar', $id_kamar);
			$this->db->delete('tbfoto');
			foreach ($fotos as $foto) {
				$this->db->insert('tbfoto', array('id_kamar' => $id_kamar, 'foto' => $foto));
			}
		}

		return $id_kamar;
	}

	function tampildata()
	{
		$this->db->select('tbkamar.*, GROUP_CONCAT(tbfoto.foto) as fotos');
		$this->db->from('tbkamar');
		$this->db->join('tbfoto', 'tbkamar.id_kamar = tbfoto.id_kamar', 'left');
		$this->db->group_by('tbkamar.id_kamar');
		$query = $this->db->get();

		$result = $query->result();

		foreach ($result as $data) {
			$status_counts = $this->getKamarStatusCount($data->id_kamar);
			$data->tersedia = 0;
			$data->tidak_tersedia = 0;
			foreach ($status_counts as $status) {
				if ($status->status_ketersediaan == 'Tersedia') {
					$data->tersedia = $status->count;
				} else {
					$data->tidak_tersedia = $status->count;
				}
			}
		}

		return $result;
	}

	function upload($uploadFile, $field, $nama)
	{
		$this->load->library('upload');
		$NamaFile = str_replace(' ', '', $nama);
		$extractFile = pathinfo($uploadFile['name']);
		$ekst = $extractFile['extension'];
		$newName = $NamaFile . "." . $ekst;
		$config['upload_path'] = FCPATH . 'berkas';
		$config['allowed_types'] = 'pdf|jpg|png|jpeg';
		$config['max_size'] = 5000;
		$config['overwrite'] = true;
		$config['file_name'] = $newName;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($field)) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			return "";
		} else {
			return $newName;
		}
	}

	function hapusdata($data)
	{
		$id_kamar = $data['id_kamar'];
		$this->db->where('id_kamar', $id_kamar);
		$this->db->delete('tbkamar');
	}

	function tambahNomorKamar($id_kamar, $nomor_kamar)
	{
		$this->db->trans_start(); // Memulai transaksi

		// Cek apakah nomor kamar sudah ada di tbnokamar
		$this->db->where('id_kamar', $id_kamar);
		$query_nokamar = $this->db->get('tbnokamar');

		if ($query_nokamar->num_rows() == 0) {
			// Jika belum ada, masukkan nomor kamar ke tbnokamar
			for ($i = 1; $i <= $nomor_kamar; $i++) {
				$data = array(
					'id_kamar' => $id_kamar,
					'no_kamar' => $i,
					'status_ketersediaan' => 'Tersedia'
				);
				$this->db->insert('tbnokamar', $data);
			}
		}

		$this->db->trans_complete(); // Akhiri transaksi

		return $this->db->trans_status();
	}

	public function getKamarStatusCount($id_kamar)
	{
		$this->db->select('status_ketersediaan, COUNT(*) as count');
		$this->db->from('tbnokamar');
		$this->db->where('id_kamar', $id_kamar);
		$this->db->group_by('status_ketersediaan');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllKamar()
	{
		$this->db->select('*');
		$this->db->from('tbkamar');
		$query = $this->db->get();
		return $query->result();
	}
}
