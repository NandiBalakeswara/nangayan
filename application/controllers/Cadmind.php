<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Cadmind extends CI_Controller {

        public function __construct()
        {
            parent :: __construct();
            $this->load->model('madmind');
        }

        function tampiladmind()
        {
            $this->load->model('mawal');
			$this->mawal->validasi();
            $this->load->view('admind');	
        }

        public function chart_data(){
            $data = $this->madmind->chart_database();
            echo json_encode($data);
        }
        

    }

?>