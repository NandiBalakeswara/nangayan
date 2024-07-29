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
        $nomor_kamar = $this->input->post('nomor_kamar');
        $fotos = array($foto1, $foto2, $foto3);

        // Panggil fungsi untuk menyimpan data kamar
        $id_kamar = $this->mkamar->simpandata($data, $fotos);

        $jumlah_kamar_sekarang = $this->mkamar->hitungNomorKamar($id_kamar);
        if (empty($jumlah_kamar_sekarang)) {
            // Panggil fungsi untuk menambahkan nomor kamar ke tbnokamar
            $this->mkamar->tambahNomorKamar($id_kamar, $nomor_kamar);
        } elseif ($nomor_kamar > $jumlah_kamar_sekarang) {
            // Tambah nomor kamar
            $tambahan = $nomor_kamar - $jumlah_kamar_sekarang;
            $this->mkamar->tambahNomorKamar($id_kamar, $tambahan);
        } elseif ($nomor_kamar < $jumlah_kamar_sekarang) {
            // Kurangi nomor kamar
            $kurang = $jumlah_kamar_sekarang - $nomor_kamar;
            $this->mkamar->hapusNomorKamar($id_kamar, $kurang);
        }
        redirect('ckamar/tampiladmink');
    }
	function hapusdata()
	{
		$data = $_POST;
		$this->mkamar->hapusdata($data);
		redirect('ckamar/tampiladmink');
	}
	function search()
	{
		$cari = $this->input->post('cari');
		$data['hasil'] = $this->mkamar->search($cari);;
		$this->load->view('adminK', $data);
	}
}
