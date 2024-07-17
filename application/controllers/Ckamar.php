<?php
class Ckamar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mkamar');
	}

	function tampiladmink()
	{
		$data['hasil'] = $this->mkamar->tampildata();
		$this->load->view('adminK', $data);
	}

	public function simpandata()
	{
		$a['jenis_kamar'] = $this->input->post('jenis_kamar');
		$a['nomor_kamar'] = $this->input->post('nomor_kamar');
		$NamaDokumen = implode("", $a);

		$foto1 = $this->mkamar->upload($_FILES['foto1'], 'foto1', $NamaDokumen . '1');
		$foto2 = $this->mkamar->upload($_FILES['foto2'], 'foto2', $NamaDokumen . '2');
		$foto3 = $this->mkamar->upload($_FILES['foto3'], 'foto3', $NamaDokumen . '3');

		$data = array(
			'id_kamar' => $this->input->post('id_kamar'),
			'jenis_kamar' => $this->input->post('jenis_kamar'),
			'deskripsi_kamar' => $this->input->post('deskripsi_kamar'),
			'harga' => $this->input->post('harga'),
		);

		$fotos = array($foto1, $foto2, $foto3);

		// Panggil fungsi untuk menyimpan data kamar
		$id_kamar = $this->mkamar->simpandata($data, $fotos);

		// Panggil fungsi untuk menambahkan nomor kamar ke tbnokamar
		$this->mkamar->tambahNomorKamar($id_kamar, $this->input->post('nomor_kamar'));

		redirect('ckamar/tampiladmink');
	}


	function hapusdata()
	{
		$data = $_POST;
		$this->mkamar->hapusdata($data);
		redirect('ckamar/tampiladmink');
	}

	public function index()
	{
		$this->load->model('Mkamar');
		$kamars = $this->Mkamar->getAllKamar();

		foreach ($kamars as &$kamar) {
			$status_counts = $this->Mkamar->getKamarStatusCount($kamar->id_kamar);
			$kamar->tersedia = 0;
			$kamar->tidak_tersedia = 0;
			foreach ($status_counts as $status_count) {
				if ($status_count->status_ketersediaan == 'Tersedia') {
					$kamar->tersedia = $status_count->count;
				} elseif ($status_count->status_ketersediaan == 'Tidak Tersedia') {
					$kamar->tidak_tersedia = $status_count->count;
				}
			}
		}

		$data['hasil'] = $kamars;
		$this->load->view('adminK', $data);
	}
}
