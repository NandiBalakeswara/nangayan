<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

    public function __construct()
	{
		parent :: __construct();
		$this->load->model('mlogin');
	}

    public function formlogin()
    {
        $data['konten']=$this->load->view('login','',TRUE);
        $this->load->view('login');
    }
    function proseslogin()
	{
		$this->mlogin->proseslogin();	
	}

    function logout() {
        $this->session->sess_destroy();
        redirect('cawal/tampilawal');
    }

}
