<?php
	class Mlogin extends CI_Model
	{

		function proseslogin()
		{
			$Username=$this->input->post('username');
			$Password=$this->input->post('password');
			
			$sql="select * from tbpengguna where username='".$Username."' ";
			$sql.="and password='".$Password."'";
			$query=$this->db->query($sql);	
			if ($query->num_rows()>0)
			{
				//ada data	
				$data=$query->row();
				$Username=$data->username;
				$NamaLengkap=$data->nama_lengkap;
				
				$session=array(
					'Username'=>$Username,
					'nama_lengkap'=>$NamaLengkap
				);

				$this->session->set_userdata($session);

				// var_dump($this->session->userdata());

                redirect('cawal/tampilhomelogin');
                

			}
			else
			{
				//tidak ada data	
				$this->session->set_flashdata('pesan','Login gagal');
				redirect('clogin/formlogin');
			}
		}
	}
?>