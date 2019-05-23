<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'dashboard_user';
			$this->load->view('template_user', $data);
			
			// $data['main_view'] = 'dashboard_user';
			// $data['jml_makanan'] = $this->user_model->get_jml_makanan();
			// $data['jml_transaksi'] = $this->user_model->get_jml_transaksi();
			// $data['jml_pengguna'] = $this->user_model->get_jml_pengguna();
			// $this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */