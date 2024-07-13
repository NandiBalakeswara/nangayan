<?php
class Cpemesanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mpemesanan');
		$this->load->database();
		$params = array('server_key' => 'SB-Mid-server-GBHAiHZjIHxUg2MqJXfp651H', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
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

		if ($this->mpemesanan->simpandata($data) === false) {
			// Tangani ketersediaan kamar yang tidak mencukupi (misalnya, tampilkan pesan error)
			$this->session->set_flashdata('error', 'Kamar yang tersedia tidak cukup!');
			redirect('cpemesanan/tampilroombooking1');
		} else {
			// Pemesanan berhasil (redirect atau tampilkan pesan sukses)
			redirect('cstatus/showBookingStatus'); // Ubah sesuai kebutuhan
		}
	}



	function tampilroombooking2()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data['pemesananList'] = $this->mpemesanan->getpesanan($id_pengguna); // Ubah menjadi getpesanan untuk mendapatkan list pesanan
		$this->load->view('roombooking2', $data); // Kirim data $data ke view roombooking2
	}

	public function token()
	{

		$jenis_kamar = $this->input->post('jenis_kamar');
		$harga_kamar = $this->input->post('harga_kamar');
		$sub_total_kamar = $this->input->post('sub_total_kamar');
		$nama_layanan = $this->input->post('nama_layanan');
		$layanan_tambahan = $this->input->post('layanan_tambahan');
		$jumlah_pesanan = $this->input->post('jumlah_pesanan');
		$lama_menginap = $this->input->post('lama_menginap');
		$total_pembayaran = $this->input->post('total_pembayaran');

		$total_sewa = $lama_menginap * $jumlah_pesanan;

		$nama_lengkap = $this->input->post('nama_lengkap');
		$email = $this->input->post('username');
		$nomor_hp = $this->input->post('nomor_hp');

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $total_pembayaran, // no decimal allowed for creditcard
		);

		// // Optional
		// $item1_details = array(
		// 	'id' => 'a1',
		// 	'price' => $sub_total_kamar,
		// 	'quantity' => $lama_menginap,
		// 	'name' => $jenis_kamar
		// );

		// // // Optional problem
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 100000,
		// 	'quantity' => 1,
		// 	'name' => $nama_layanan
		// );

		// // Optional
		// $item_details = array($item1_details, $item2_details);

		// Optional
		$billing_address = array(
			'first_name'    => $nama_lengkap,
			'phone'         => $nomor_hp
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $nama_lengkap,
			'address'       => $email,
			'phone'         => $nomor_hp
		);

		// Optional
		$customer_details = array(
			'first_name'    => $nama_lengkap,
			'email'         => "andri@litani.com",
			'phone'         => $nomor_hp,
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			// 'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'));
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>';
		// redirect('cawal/tampilroombooking3');

		$result_type = $this->input->post('result_type');
		$result_data = $this->input->post('result_data');
		$jenis_kamar = $this->input->post('jenis_kamar');
		$harga_kamar = $this->input->post('harga_kamar');
		$sub_total_kamar = $this->input->post('sub_total_kamar');
		$nama_layanan = $this->input->post('nama_layanan');
		$total_pembayaran = $this->input->post('total_pembayaran');

		// Lakukan verifikasi pembayaran (misalnya dari Midtrans) disini
		if ($result_type == 'success') {
			// Update status pembayaran menjadi 'Tervalidasi' berdasarkan id_pengguna
			$this->load->model('Mpemesanan');
			$id_pengguna = $this->session->userdata('id_pengguna'); // Sesuaikan dengan cara Anda menangani id_pengguna
			$this->mpemesanan->updateStatusPembayaran($id_pengguna);

			// Tampilkan halaman atau redirect ke halaman sukses
			redirect('cawal/tampilroombooking3');
		} elseif ($result->transaction_status == 'expired') {
			error_log('Transaction expired');
			redirect('cpemesanan/tampilroombooking2');
		} else {
			error_log('Transaction failed');
			redirect('cpemesanan/tampilroombooking2');
		}
	}
}
