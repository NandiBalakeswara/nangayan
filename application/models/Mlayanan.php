<?php
	class Mlayanan extends CI_Model
	{
		function simpandata($data)
		{
			if ($data['id_layanan']=="")
			{
            //penulisan SQL menggunakan query builder
				//simpan
				$this->db->insert('tblayanan',$data);
			}
			else
			{
				//edit	
				$Kode=$data['id_layanan'];
				$this->db->where('id_layanan', $Kode);
				$this->db->update('tblayanan',$data);
			}
		}
		function tampildata()
		{
			$query = $this->db->get('tblayanan');

			if ($query->num_rows() > 0) {
				$hasil = $query->result();
			} else {
				$hasil = array();
			}

			return $hasil;
		}
        function hapusdata($data){
			$Kode=$data['id_layanan'];
			$this->db->where('id_layanan', $Kode);
			$this->db->delete('tblayanan');
		}
	}
?>