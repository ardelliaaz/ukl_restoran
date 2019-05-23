<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('login')!=true){
		// 	redirect(base_url('index.php/login'),'refresh');
		// }
		$this->load->model('verifikasi_model','verifikasi');
		$this->load->model('user_model','user');
	}

	public function index()
	{
		$data['main_view']="verifikasi_view";
		$data['data_pembayaran']=$this->verifikasi->get_pembayaran();
		$this->load->view('template', $data, FALSE);
	}
	/*public function verifikasi($id_pembayaran,$id_tagihan,$status)
	{
		$veri=$this->verifikasi->get_verifikasi($id_pembayaran,$id_tagihan,$status);
		if($veri){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Sukses menverifikasi pembayaran</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Sukses menverifikasi pembayaran</div>');
		}
		redirect(base_url('index.php/verifikasi'),'refresh');
	}
*/
}

/* End of file Verification.php */
/* Location: ./application/controllers/Verification.php */