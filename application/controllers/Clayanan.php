<?php 
class Clayanan extends CI_Controller {
    public function __construct()
		{
			parent::__construct();
			$this->load->model('mlayanan');
		}

    function tampiladminl()
    {
        $data['hasil']=$this->mlayanan->tampiladminl();
        $this->load->view('adminL',$data);	
    }

    public function addlayanan() 
    {
        // Mengambil data dari formulir tambah layanan
        $data = array(
            'nama_layanan' => $this->input->post('nama_layanan'),
            'deskripsi_layanan' => $this->input->post('deskripsi_layanan'),
            'harga_layanan' => $this->input->post('harga_layanan')
        );

        // Menyimpan data ke dalam tabel 'tblayanan'
        $this->mlayanan->addlayananm($data);
        redirect('clayanan/tampiladminl'); // Mengarahkan kembali ke halaman 'tampiladminl'
    }

    public function editlayanan()
    {
        // Mengambil data dari formulir edit layanan
        $data=$_POST;
        $this->load->model('mlayanan');
        $this->mlayanan->editlayananm($data);

        redirect('clayanan/tampiladminl');
    }

    public function deletelayanan() {
        $data=$_POST;
        $this->load->model('mlayanan');
        $this->mlayanan->deletelayananm($data);

        redirect('clayanan/tampiladminl'); 
    }

}
?>
