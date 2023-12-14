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
		function tampilstatus()
		{
			$this->load->view('status');	
		}
		function tampilroombooking1()
		{
			$this->load->view('roombooking1');	
		}
		function tampilroombooking2()
		{
			$this->load->view('roombooking2');	
		}
		function tampilroombooking3()
		{
			$this->load->view('roombooking3');	
		}
	}
?>