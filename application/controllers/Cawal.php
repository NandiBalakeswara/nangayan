<?php
	class Cawal extends CI_Controller
	{

		public function __construct()
		{
			parent :: __construct();
			$this->load->model('mawal');
		}

		public function tampilawal()
		{
			$data['top_rooms'] = $this->mawal->getTopTwoRooms();
			$this->load->view('landing_page', $data);
			
		}	

		function tampilroomdetails()
		{
			$this->load->view('roomdetails');	
		}	

		function tampilhomelogin()
		{
			
			$this->mawal->validasi();
			$data['top_rooms'] = $this->mawal->getTopTwoRooms();
			$this->load->view('homelogin',$data);
			
		}
		
		function tampilroombooking3()
		{
			$this->load->view('roombooking3');	
		}
	}
?>