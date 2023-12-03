<?php
	class Cawal extends CI_Controller
	{
		function tampilawal()
		{
			$this->load->view('landing_page');	
		}	

		function tampilrooms()
		{
			$this->load->view('rooms');	
		}	
		function tampilroomdetails()
		{
			$this->load->view('roomdetails');	
		}	

		function tampilhomelogin()
		{
			$this->load->view('homelogin');	
		}
		function tampilroomslogin()
		{
			$this->load->view('roomslogin');	
		}
		
	}
?>