<?php
class Clayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mlayanan');
    }

    function tampiladminl()
    {
        $data['hasil'] = $this->mlayanan->tampildata();
        $this->load->view('adminL', $data);
    }
    function simpandata()
    {
        $data=$_POST;
        $this->mlayanan->simpandata($data);
        redirect('clayanan/tampiladminl');	
    }
    function hapusdata(){
        $data=$_POST;
        $this->mlayanan->hapusdata($data);
        redirect('clayanan/tampiladminl');
    }
}
?>

