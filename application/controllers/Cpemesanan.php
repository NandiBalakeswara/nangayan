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

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => 94000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => 18000,
			'quantity' => 3,
			'name' => "Apple"
		);

		// Optional
		$item2_details = array(
			'id' => 'a2',
			'price' => 20000,
			'quantity' => 2,
			'name' => "Orange"
		);

		// Optional
		$item_details = array($item1_details, $item2_details);

		// Optional
		$billing_address = array(
			'first_name'    => "Andri",
			'last_name'     => "Litani",
			'address'       => "Mangga 20",
			'city'          => "Jakarta",
			'postal_code'   => "16602",
			'phone'         => "081122334455",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "Obet",
			'last_name'     => "Supriadi",
			'address'       => "Manggis 90",
			'city'          => "Jakarta",
			'postal_code'   => "16601",
			'phone'         => "08113366345",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => "Andri",
			'last_name'     => "Litani",
			'email'         => "andri@litani.com",
			'phone'         => "081122334455",
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
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
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
		echo 'RESULT <br><pre>';
		var_dump($result);
		echo '</pre>';
	}
}
