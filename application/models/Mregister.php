<?php
// application/models/Mregister.php

class Mregister extends CI_Model {
    public function simpandata() {
        $data = $_POST;
        $Username = $data['username'];

        $this->db->where('username', $Username);
        $query = $this->db->get('tbpengguna');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Username sudah terdaftar');
            redirect('cregister/formregister');
        } else {
            $dataToInsert = [
                'nama_lengkap' => $data['nama_lengkap'],
                'username' => $data['username'],
                'password' => $data['password'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'nomor_hp' => $data['nomor_hp'],
                'level' => 'User'
            ];
            $this->db->insert('tbpengguna', $dataToInsert);

            return $this->sendNotificationEmail($data['username'], $data['nama_lengkap']);
        }
    }

    public function sendNotificationEmail($toEmail, $toName) {
        require_once APPPATH . 'PHPMailerConfig.php';

        $mail = PHPMailerConfig::getMailer();
        if ($mail) {
            try {
                $mail->addAddress($toEmail, $toName);
                $mail->Subject = 'Notification Email NangAyan Hotel';
                $mail->Body    = 'Registration Success. Thank you for registering with us.';
                $mail->AltBody = 'Registration Success. Thank you for registering with us.';

                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
        return false;
    }
}
?>
