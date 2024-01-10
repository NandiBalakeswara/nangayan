<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model
        $this->load->model('mreport');
    }

    public function index() {
        // Get data from the model
        $data['report_data'] = $this->mreport->datareport();

        // Load view with data
        $this->load->view('adminR', $data);
    }

}
