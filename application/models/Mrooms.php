<?php

class Mrooms extends CI_Model
{
    function tampildata()
    {
        $query = $this->db->get('tbkamar');
        return $query->result();
    }

    function tampildatalogin()
    {
        $query = $this->db->get('tbkamar');
        return $query->result();
    }

    function getRoomDetails($id_kamar)
    {
        $query = $this->db->get_where('tbkamar', array('id_kamar' => $id_kamar));
        return $query->row();
    }

    function getFirstPhoto($id_kamar)
    {
        $query = $this->db->get_where('tbfoto', array('id_kamar' => $id_kamar), 1);
        return $query->row();
    }

    function getRoomPhotos($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $query = $this->db->get('tbfoto');
        return $query->result(); // Mengembalikan daftar foto
    }
}
