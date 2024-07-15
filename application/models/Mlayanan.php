<?php
class Mlayanan extends CI_Model{
    function tampiladminl()
    {
        $query=$this->db->get('tblayanan');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $hasil[]=$data;	
            }	
        }
        else
        {
            $hasil=array();	
        }
        return $hasil;	
        
    }

    public function addlayananm($data)
    {
        // Memasukkan data baru ke dalam tabel 'tblayanan'
        $this->db->insert('tblayanan', $data);
    }

    public function editlayananm($data) {
        // Mengupdate data di dalam tabel 'tblayanan' berdasarkan ID layanan
        $id_layanan=$data['id_layanan'];
        echo $id_layanan;
        $this->db->where('id_layanan', $id_layanan);
        $this->db->update('tblayanan', $data);
    }

    public function deletelayananm($data)
    {
        $id_layanan=$data['id_layanan'];
        echo $id_layanan;
        $this->db->where('id_layanan', $id_layanan);
        $this->db->delete('tblayanan');
    }
    function search($cari){
        $this->db->like('tblayanan.nama_layanan', $cari);
		$query = $this->db->get('tblayanan');
		return $query->result();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
        
	}

}
?>