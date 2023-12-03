<?php
    class Mregister extends CI_Model{
        function simpandata()
		{
			$data=$_POST;
			$NamaLengkap=$data['nama_lengkap'];
			$Username =$data['username'];
			$Password =$data['password'];
			$jenis_kelamin =$data['jenis_kelamin'];
			$nomor_hp =$data['nomor_hp'];
			$tempat_lahir =$data['tempat_lahir'];
			$tgl_lahir =$data['tgl_lahir'];
			$alamat =$data['alamat'];
			$agama =$data['agama'];


			$data['nama_lengkap']=$NamaLengkap;
			$data['username']=$Username;
			$data['password']=$Password;
			$data['jenis_kelamin']=$jenis_kelamin;
			$data['nomor_hp']=$nomor_hp;
			$data['tempat_lahir']=$tempat_lahir;
			$data['tgl_lahir']=$tgl_lahir;
			$data['alamat']=$alamat;
			$data['agama']=$agama;
			

			$id_pengguna=$data['id_pengguna'];
			if ($id_pengguna=="")
			{
				//simpan
				$this->db->insert('tbpengguna',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');	
				redirect('clogin/formlogin');
			}
			else
			{
				$this->session->set_flashdata('pesan','Register gagal');
				redirect('cregister/formregister');
			}
		}
    }
?>