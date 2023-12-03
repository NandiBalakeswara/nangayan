<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cregister extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mregister');
    }

    public function formregister()
    {
        $this->load->view('register');
    }
    public function simpandata()
	{
		$this->mregister->simpandata();
		redirect('clogin/formlogin');	
	}
}
