<?php
	class Mlogin extends CI_Model
	{
		
		function proseslogin()
		{
			$Username=$this->input->post('username');
			$Password=$this->input->post('password');
			
			$sql="select * from tbpengguna where Username='".$Username."' ";
			$sql.="and Password='".$Password."'";
			$query=$this->db->query($sql);	
				
				$data=$query->row();
				$Level=$data->level;
				$Username=$data->username;
				$NamaLengkap=$data->nama_lengkap;
				$id_pengguna=$data->id_pengguna;
				$nomor_hp=$data->nomor_hp;
				$session=array(
					'username'=>$Username,
					'nama_lengkap'=>$NamaLengkap,
					'id_pengguna'=>$id_pengguna,
					'nomor_hp'=>$nomor_hp
					
				);
				if ($query->num_rows()>0)
				{
					if($Level =='Admin'){
						$this->session->set_userdata($session);
						redirect('cpengguna/tampiladminp');

					}
					else{
						$this->session->set_userdata($session);
						redirect('cawal/tampilhomelogin');

					}
				
				
			}
			else
			{
				//tidak ada data	
				$this->session->set_flashdata('pesan','Username atau Password yang anda masukan salah');
				redirect('clogin/formlogin');
				
			}
		}
		
	}
?>