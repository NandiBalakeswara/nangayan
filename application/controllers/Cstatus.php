<?php
class Cstatus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mstatus');
    }

    public function showBookingStatus()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['data'] = $this->mstatus->getBookingData($id_pengguna);
        $data['roomNumbers'] = $this->mstatus->getRoomNumbers($id_pengguna);

        $this->load->view('status', $data);
    }
}
