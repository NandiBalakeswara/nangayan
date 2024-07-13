<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpayment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpemesanan');
    }

    public function payment_notification()
    {
        // Mengambil data dari notifikasi Midtrans
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result, true);

        if ($result) {
            $order_id = $result['order_id'];
            $transaction_status = $result['transaction_status'];

            // Jika pembayaran berhasil, ubah status_pembayaran menjadi 'Tervalidasi'
            if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
                $this->Mpemesanan->update_payment_status($order_id, 'Tervalidasi');
            }
        }
    }
}
