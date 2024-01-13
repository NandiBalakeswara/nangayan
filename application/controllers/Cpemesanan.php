<?php
	class Cpemesanan extends CI_Controller
	{
        public function __construct()
    {
        parent::__construct();
        $this->load->model('mpemesanan');
    }
        function tampilroombooking1()
		{
			$id_kamar=$this->input->post('id_kamar');
            $data['waktu_masuk']=$this->input->post('waktu_masuk');
            $data['waktu_keluar']=$this->input->post('waktu_keluar');
			$data['kamar'] = $this->mpemesanan->getRoomDetails($id_kamar);
			$this->load->view('roombooking1', $data);	
		}
        function simpandata()
		{
			$data=$_POST;
			$data['kode_pembayaran']=$this->mpemesanan->getkodepembayaran();
			$nama_layanan=$this->input->post('nama_layanan');
			$data['id_layanan']=$this->mpemesanan->getidlayanan($nama_layanan);
			$this->mpemesanan->simpandata($data);
			redirect('cpemesanan/tampilroombooking2');	
		}
		function tampilroombooking2()
		{
			$id_pengguna=$this->session->userdata('id_pengguna');
			$data['pemesanan'] = $this->mpemesanan->getpesanan($id_pengguna);
			$this->load->view('roombooking2', $data);	
		}
	}
?>
