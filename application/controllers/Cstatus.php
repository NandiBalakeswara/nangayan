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
        // Ambil id_pengguna dari sesi login (sesuaikan dengan implementasi login Anda)
        $id_pengguna = $this->session->userdata('id_pengguna');

        // Panggil model untuk mendapatkan data booking
        $data['data'] = $this->mstatus->getBookingData($id_pengguna);

        // Pindahkan data ke view
         $this->load->view('status', $data);
    }
}
?>
