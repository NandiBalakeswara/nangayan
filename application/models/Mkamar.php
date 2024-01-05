<?php
	class Mkamar extends CI_Model
	{
		function simpandata($data)
		{
			if ($data['id_kamar']=="")
			{
            //penulisan SQL menggunakan query builder
				//simpan
				$this->db->insert('tbkamar',$data);
			}
			else
			{
				//edit	
				$Kode=$data['id_kamar'];
				$this->db->where('id_kamar', $Kode);
				$this->db->update('tbkamar',$data);
			}
		}
		function tampildata()
		{
			$query = $this->db->get('tbkamar');

			if ($query->num_rows() > 0) {
				$hasil = $query->result();
			} else {
				$hasil = array();
			}

			return $hasil;
		}

		function upload($uploadFile,$field,$nama)
		{
			$this->load->library('upload');
			$NamaFile=str_replace(' ', '', $nama);
			$extractFile = pathinfo($uploadFile['name']);	
			$ekst = $extractFile['extension'];
			$newName = $NamaFile.".".$ekst; 
			$config['upload_path']				= FCPATH.'berkas';
			$config['allowed_types']			= 'pdf|jpg|png|jpeg';
			$config['max_size']         		= 5000;
			$config['overwrite'] 				= true;
			$config['file_name'] 				= $newName;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload($field)){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				
				return "";
			}else{
				
				return $newName;
			}
		}
		function hapusdata($data){
			
			$Kode=$data['id_kamar'];
			$this->db->where('id_kamar', $Kode);
			$this->db->delete('tbkamar');
		}
	}
?>