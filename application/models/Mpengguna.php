<?php
class Mpengguna extends CI_Model{
function tampiladminp()
{
    $query=$this->db->get('tbpengguna');
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
public function editdatapengguna($data){
   
    $id_pengguna=$data['id_pengguna'];
    $this->db->where('id_pengguna', $id_pengguna);
    $this->db->update('tbpengguna', $data);
}

public function hapusdatapengguna($data){
   
    $id_pengguna=$data['id_pengguna'];
    $this->db->where('id_pengguna', $id_pengguna);
    $this->db->delete('tbpengguna');
}

}
?>