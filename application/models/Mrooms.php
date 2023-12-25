<?php

    class Mrooms extends CI_Model{
        function tampildata(){
            $query = $this->db->get('tbkamar');
            return $query->result();
        }

        function tampildatalogin(){
            $query = $this->db->get('tbkamar');
            return $query->result();
        }

        function getRoomDetails($id_kamar) {
            $query = $this->db->get_where('tbkamar', array('id_kamar' => $id_kamar));
            return $query->row();
        }
    }

?>
