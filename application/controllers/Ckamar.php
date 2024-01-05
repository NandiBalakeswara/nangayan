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
    function simpandata()
		{
			$a['jenis_kamar'] =$this->input->post('jenis_kamar');
			$a['nomor_kamar']=$this->input->post('nomor_kamar');
			$NamaDokumen=implode("",$a);
			$NamaFile=$this->mkamar->upload($_FILES['foto'],'foto',$NamaDokumen);
			
			$data=array(
                'id_kamar' => $this->input->post('id_kamar'),
				'jenis_kamar'=>$this->input->post('jenis_kamar'),
				'deskripsi_kamar' => $this->input->post('deskripsi_kamar'),
				'harga' => $this->input->post('harga'),
				'nomor_kamar' => $this->input->post('nomor_kamar'),
				'foto'=>$NamaFile
			);	
			
			$this->mkamar->simpandata($data);
			redirect('ckamar/tampiladmink');	
		}
		function hapusdata(){
			$data=$_POST;
			$this->mkamar->hapusdata($data);
			redirect('ckamar/tampiladmink');	
		}
}
?>
