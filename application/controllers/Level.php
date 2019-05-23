<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('level_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'level_view';
			// $data['level'] = $this->pengguna_model->get_pengguna();
			$data['level'] = $this->level_model->get_level();
			$this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$this->form_validation->set_rules('nama_level', 'nama_level', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->level_model->tambah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah level berhasil');
					redirect('level/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah level gagal');
					redirect('level/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('level/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_nama_level','ubah_nama_level', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->level_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah level berhasil');
					redirect('level/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah level gagal');
					redirect('level/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('level/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->level_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus level Berhasil');
				redirect('level/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus level gagal');
				redirect('level/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_level_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->level_model->get_data_level_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file level.php */
/* Location: ./application/controllers/level.php */