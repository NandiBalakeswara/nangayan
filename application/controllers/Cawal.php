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
			$data['top_rooms'] = $this->mawal->getTopTwoRooms();
			$this->load->view('homelogin',$data);	
		}
		
		function tampilstatus()
		{
			$this->load->view('status');	
		}
		// function tampilroombooking1()
		// {
		// 	$this->load->view('roombooking1');	
		// }
		// function tampilroombooking2()
		// {
		// 	$this->load->view('roombooking2');	
		// }
		function tampilroombooking3()
		{
			$this->load->view('roombooking3');	
		}
	}
?>