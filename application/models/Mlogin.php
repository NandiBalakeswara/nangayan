<?php
	class Mlogin extends CI_Model
	{
		
		function proseslogin()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->db->select('*');
			$this->db->from('tbpengguna');
			$this->db->where('Username', $username);
			$this->db->where('Password', $password);
			$query = $this->db->get();

			$data = $query->row();

			if ($query->num_rows() > 0) {
				$level = $data->level;
				$username = $data->username;
				$namaLengkap = $data->nama_lengkap;
				$idPengguna = $data->id_pengguna;
				$nomorHP = $data->nomor_hp;

				$session = array(
					'username' => $username,
					'nama_lengkap' => $namaLengkap,
					'id_pengguna' => $idPengguna,
					'nomor_hp' => $nomorHP
				);

				if ($level == 'Admin') {
					$this->session->set_userdata($session);
					redirect('cadmind/tampiladmind');
				} else {
					$this->session->set_userdata($session);
					redirect('cawal/tampilhomelogin');
				}
			} else {
				// tidak ada data
				$this->session->set_flashdata('pesan', 'Username atau Password yang anda masukan salah');
				redirect('clogin/formlogin');
			}
		}

		
	}
?>