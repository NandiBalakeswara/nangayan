<?php 
class Cpengguna extends CI_Controller {
    public function __construct()
		{
			parent::__construct();
			$this->load->model('mpengguna');
		}
function tampiladminp()
{
    $data['hasil']=$this->mpengguna->tampiladminp();
    $this->load->view('adminP',$data);	
}

function editdatapengguna()
		{
			$data=$_POST;
			$this->mpengguna->editdatapengguna($data);
			redirect('cpengguna/tampiladminp');
		}

function hapusdatapengguna()
		{
			$data=$_POST;
			$this->mpengguna->hapusdatapengguna($data);
			redirect('cpengguna/tampiladminp');
		}
		function search()
		{
			$cari = $this->input->post('cari');
			$data['hasil'] =$this->mpengguna->search($cari);;
			$this->load->view('adminP', $data);
		}
}
?>