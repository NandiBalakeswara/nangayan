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
	}

	function tampildata()
	{
		$this->db->select('tbkamar.*, GROUP_CONCAT(tbfoto.foto) as fotos');
		$this->db->from('tbkamar');
		$this->db->join('tbfoto', 'tbkamar.id_kamar = tbfoto.id_kamar', 'left');
		$this->db->group_by('tbkamar.id_kamar');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
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
}
