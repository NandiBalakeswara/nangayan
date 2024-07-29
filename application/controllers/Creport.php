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
        $data['total_pendapatan'] = $this->mreport->getTotalPendapatan();
        $data['jenis_kamar_list'] = $this->mreport->getAllJenisKamar(); // Ambil jenis kamar

        // Check if the report_data is empty
        $data['is_empty'] = empty($data['report_data']);

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
            'nama_layanan' => $this->input->post('nama_layanan')
        ];

        // Get filtered data from the model
        $data['report_data'] = $this->mreport->searchReport($criteria);
        $data['total_pendapatan'] = $this->mreport->getTotalPendapatan($criteria);
        $data['jenis_kamar_list'] = $this->mreport->getAllJenisKamar(); // Ambil jenis kamar

        // Check if the report_data is empty
        $data['is_empty'] = empty($data['report_data']);

        // Load view with data
        $this->load->view('adminR', $data);
    }
}
