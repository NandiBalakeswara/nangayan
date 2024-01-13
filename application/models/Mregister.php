<?php
    class Mregister extends CI_Model{
        function simpandata()
		{
			$data=$_POST;
			$Username =$data['username'];
			

			$this->db->where('username', $Username);
			$query = $this->db->get('tbpengguna');

			if($query->num_rows()>0){
				$this->session->set_flashdata('pesan','Email sudah terdaftar');
				redirect('cregister/formregister');
			 }
			 else{
				$data=$_POST;
				$data['level']="User";
				$this->db->insert('tbpengguna', $data);
				redirect('clogin/formlogin');
			 }

		}

    }


?>