<?php
class Cpemesanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mpemesanan');
		$this->load->database();
	}

	function tampilroombooking1()
	{
		$id_kamar = $this->input->post('id_kamar');
		$data['waktu_masuk'] = $this->input->post('waktu_masuk');
		$data['waktu_keluar'] = $this->input->post('waktu_keluar');
		$data['kamar'] = $this->mpemesanan->getRoomDetails($id_kamar);
		$data['first_photo'] = $this->mpemesanan->getFirstPhoto($id_kamar);
		$data['layananList'] = $this->db->get('tblayanan')->result();
		$this->load->view('roombooking1', $data);
	}

	function simpandata()
	{
		$data = $this->input->post();
		$data['kode_pembayaran'] = $this->mpemesanan->getkodepembayaran();

		// Cek validitas no_kamar
		$no_kamar = '1'; // Diganti dengan logika bisnis Anda untuk mendapatkan no_kamar yang valid
		$query = $this->db->get_where('tbnokamar', array('no_kamar' => $no_kamar));

		if ($query->num_rows() > 0) {
			$data['no_kamar'] = $no_kamar;
			$this->mpemesanan->simpandata($data);
			redirect('cpemesanan/tampilroombooking2');
		} else {
			echo 'Error: No Kamar tidak ditemukan.';
		}
	}

	function tampilroombooking2()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data['pemesananList'] = $this->mpemesanan->getpesanan($id_pengguna); // Ubah menjadi getpesanan untuk mendapatkan list pesanan
		$this->load->view('roombooking2', $data); // Kirim data $data ke view roombooking2
	}
}
