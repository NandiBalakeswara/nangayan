<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Creport extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('mreport');
    }

    public function index()
    {
        // Get data from the model
        $data['report_data'] = $this->mreport->datareport();

        // Load view with data
        $this->load->view('adminR', $data);
    }

    public function search()
    {
        // Get search criteria from POST data
        $criteria = [
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'jenis_kamar' => $this->input->post('jenis_kamar'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'pendapatan' => $this->input->post('pendapatan')
        ];

        // Get filtered data from the model
        $data['report_data'] = $this->mreport->searchReport($criteria);

        // Load view with data
        $this->load->view('adminR', $data);
    }
}
