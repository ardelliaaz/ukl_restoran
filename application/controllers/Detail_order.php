<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_order extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'ddetail_order';
			$this->load->view('template', $data);
			
			// $data['main_view'] = 'dashboard_user';
			// $data['jml_makanan'] = $this->user_model->get_jml_makanan();
			// $data['jml_transaksi'] = $this->user_model->get_jml_transaksi();
			// $data['jml_pengguna'] = $this->user_model->get_jml_pengguna();
			// $this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
    }
    
    
	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
			$this->form_validation->set_rules('total', 'total', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	

			if ($this->form_validation->run() == TRUE) {
				if($this->detail_order_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah detail_order berhasil');
					redirect('detail_order/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah detail_order gagal');
					redirect('detail_order/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('detail_order/index');
			}


		} else {
			redirect('login/index');
		}
	}

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */