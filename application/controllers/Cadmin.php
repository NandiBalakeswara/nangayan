<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

    public function __construct()
	{
		parent :: __construct();
		$this->load->model('madmin');
	}

    function tampiladminp()
	{
		$this->load->view('adminP');	
	}

	function tampiladmink()
	{
		$this->load->view('adminK');	
	}

	function tampiladminl()
	{
		$this->load->view('adminL');	
	}

    public function tampiladminpesan()
    {
        $data['pemesanan'] = $this->madmin->tampildatapemesan();
        $this->load->view('adminpesan', $data);
    }

	public function updatepemesanan(){
		// Ambil nilai dari formulir
		$id_pemesanan = $this->input->post('id_pemesanan');
		$id_pengguna = $this->input->post('id_pengguna');
		$id_kamar = $this->input->post('id_kamar');
		$id_layanan = $this->input->post('id_layanan');
		$status_pemesanan = $this->input->post('status_pemesanan');
		$status_pembayaran = $this->input->post('status_pembayaran');
		$kode_pembayaran = $this->input->post('kode_pembayaran');
		$nomor_kamar = $this->input->post('nomor_kamar');
	
		// Panggil model untuk melakukan update
		$this->madmin->updateDataPemesanan($id_pemesanan, $id_pengguna, $id_kamar, $id_layanan, $status_pemesanan, $status_pembayaran,$kode_pembayaran,$nomor_kamar);
	
		// Redirect atau lakukan operasi lain sesuai kebutuhan
		redirect('cadmin/tampiladminpesan');
	}

	public function hapuspemesanan(){
		// Ambil nilai ID pemesanan dari formulir
		$id_pemesanan = $this->input->post('id_pemesanan');
	
		// Panggil model untuk melakukan hapus
		$this->madmin->hapusDataPemesanan($id_pemesanan);
	
		// Redirect atau lakukan operasi lain sesuai kebutuhan
		redirect('cadmin/tampiladminpesan');
	}
	
}
?>