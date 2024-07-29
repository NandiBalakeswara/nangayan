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
		$this->db->select('tbkamar.*, 
                   COUNT(DISTINCT tbnokamar.no_kamar) as jumlah, 
                   (SELECT COUNT(*) FROM tbnokamar WHERE tbnokamar.id_kamar = tbkamar.id_kamar AND tbnokamar.status_ketersediaan = "Tersedia") as jumlah_tersedia, 
                   (SELECT COUNT(*) FROM tbnokamar WHERE tbnokamar.id_kamar = tbkamar.id_kamar AND tbnokamar.status_ketersediaan = "Tidak Tersedia") as jumlah_tidak_tersedia, 
                   GROUP_CONCAT(DISTINCT tbfoto.foto) as fotos');
		$this->db->from('tbkamar');
		$this->db->join('tbnokamar', 'tbkamar.id_kamar = tbnokamar.id_kamar', 'left');
		$this->db->join('tbfoto', 'tbkamar.id_kamar = tbfoto.id_kamar', 'left');
		$this->db->group_by('tbkamar.id_kamar');
		$query = $this->db->get();
		return $query->result();

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

	function search($cari)
	{
		$this->db->select('tbkamar.*, 
                   COUNT(DISTINCT tbnokamar.no_kamar) as jumlah, 
                   (SELECT COUNT(*) FROM tbnokamar WHERE tbnokamar.id_kamar = tbkamar.id_kamar AND tbnokamar.status_ketersediaan = "Tersedia") as jumlah_tersedia, 
                   (SELECT COUNT(*) FROM tbnokamar WHERE tbnokamar.id_kamar = tbkamar.id_kamar AND tbnokamar.status_ketersediaan = "Tidak Tersedia") as jumlah_tidak_tersedia, 
                   GROUP_CONCAT(DISTINCT tbfoto.foto) as fotos');
		$this->db->from('tbkamar');
		$this->db->join('tbnokamar', 'tbkamar.id_kamar = tbnokamar.id_kamar', 'left');
		$this->db->join('tbfoto', 'tbkamar.id_kamar = tbfoto.id_kamar', 'left');
		$this->db->like('tbkamar.jenis_kamar', $cari);
		$this->db->group_by('tbkamar.id_kamar');
		$query = $this->db->get();
		return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}
	// Fungsi untuk menambahkan nomor kamar baru ke tbnokamar
    function tambahNomorKamar($id_kamar, $tambahan_kamar)
    {
        $this->db->trans_start(); // Memulai transaksi

        // Ambil jumlah kamar yang sudah ada
        $this->db->select_max('no_kamar');
        $this->db->where('id_kamar', $id_kamar);
        $query = $this->db->get('tbnokamar');
        $row = $query->row();
        $last_no_kamar = $row ? $row->no_kamar : 0;

        // Tambahkan kamar baru dengan nomor urut berikutnya
        for ($i = 1; $i <= $tambahan_kamar; $i++) {
            $no_kamar_baru = $last_no_kamar + $i;
            $data = array(
                'id_kamar' => $id_kamar,
                'no_kamar' => $no_kamar_baru,
                'status_ketersediaan' => 'Tersedia'
            );
            $this->db->insert('tbnokamar', $data);
        }

        $this->db->trans_complete(); // Akhiri transaksi

        return $this->db->trans_status();
    }

    // Fungsi untuk mengurangi nomor kamar dari tbnokamar
    function hapusNomorKamar($id_kamar, $kurang_kamar)
    {
        $this->db->trans_start(); // Memulai transaksi

        // Ambil nomor kamar tertinggi
        $this->db->select('no_kamar');
        $this->db->where('id_kamar', $id_kamar);
        $this->db->order_by('no_kamar', 'DESC');
        $this->db->limit($kurang_kamar);
        $query = $this->db->get('tbnokamar');
        $kamar_hapus = $query->result();

        // Hapus kamar dengan nomor tertinggi
        foreach ($kamar_hapus as $kamar) {
            $this->db->where('id_kamar', $id_kamar);
            $this->db->where('no_kamar', $kamar->no_kamar);
            $this->db->delete('tbnokamar');
        }

        $this->db->trans_complete(); // Akhiri transaksi

        return $this->db->trans_status();
    }

    // Fungsi untuk menghitung jumlah kamar
    function hitungNomorKamar($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $this->db->from('tbnokamar');
        return $this->db->count_all_results();
    }

}
