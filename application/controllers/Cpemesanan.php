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
			$data = $_POST;
			$data['kode_pembayaran'] = $this->mpemesanan->getkodepembayaran();
			$id_layanan = $this->input->post('id_layanan');

			if (!empty($id_layanan)) {
				$data['id_layanan'] = $id_layanan;
				$this->mpemesanan->simpandata($data);
				redirect('cpemesanan/tampilroombooking2');
			} else {
				// Tindakan jika id_layanan kosong (misalnya, menampilkan pesan kesalahan)
				echo 'Error: Pilih Layanan Tambahan terlebih dahulu.';
			}
		}


		function tampilroombooking2()
		{
			$id_pengguna=$this->session->userdata('id_pengguna');
			$data['pemesanan'] = $this->mpemesanan->getpesanan($id_pengguna);
			$this->load->view('roombooking2', $data);	
		}
	}
?>
