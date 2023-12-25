<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crooms extends CI_Controller {

    public function __construct()
	{
		parent :: __construct();
		$this->load->model('mrooms');
	}

    function tampilrooms()
	{
        $data['kamar'] = $this->mrooms->tampildata();
        $this->load->view('rooms', $data);
	}	

    function tampilroomslogin()
    {
        $data['kamar'] = $this->mrooms->tampildatalogin();
        $this->load->view('roomslogin', $data);	
    }

    function tampilroomdetails($id_kamar) {
        $data['room'] = $this->mrooms->getRoomDetails($id_kamar);
        $this->load->view('roomdetails', $data);
    }
}

?>
