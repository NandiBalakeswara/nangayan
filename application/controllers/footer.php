<?php
defined('BASEPATH') or exit('No direct script access allowed');

class footer extends CI_Controller
{

    public function showAboutUs()
    {

        $this->load->view('aboutUs');
    }
    public function showAboutUsLogin()
    {

        $this->load->view('aboutUsLogin');
    }

    public function showTermAndCondition()
    {

        $this->load->view('termAndCondition');
    }

    public function showLoginTermAndConditionLogin()
    {

        $this->load->view('loginTermAndConditionLogin');
    }
}
