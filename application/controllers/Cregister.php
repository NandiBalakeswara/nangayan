<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cregister extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mregister');
    }

    public function formregister() {
        $this->load->view('register');
    }

    public function simpandata() {
        $result = $this->Mregister->simpandata();
        if ($result) {
            $this->session->set_flashdata('pesan', 'Registrasi berhasil, silakan cek email untuk notifikasi.');
        } else {
            $this->session->set_flashdata('pesan', 'Registrasi berhasil, tetapi gagal mengirim email notifikasi.');
        }
        redirect('cregister/formregister');
    }
}
?>
