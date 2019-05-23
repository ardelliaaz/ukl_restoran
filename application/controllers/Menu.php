<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'menu_view';
			$data['makanan'] = $this->menu_model->get_makanan();

			//get_kategori untuk dropdown tambah/edit buku
			// $data['kategori'] = $this->menu_model->get_kategori();
			$this->load->view('template', $data);

		} else {
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){
			// $this->form_validation->set_rules('id_makanan', 'id_makanan', 'trim|required');
			$this->form_validation->set_rules('kode_masakan', 'kode_makanan', 'trim|required');
			$this->form_validation->set_rules('nama_masakan', 'nama_makanan', 'trim|required');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('status_masakan', 'kategori', 'trim|required');
			$this->form_validation->set_rules('stok', 'stok', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
					if($this->menu_model->tambah() == TRUE)
					{
						$this->session->set_flashdata('notif', 'Tambah menu berhasil');
						redirect('menu/index');
					} else {
						$this->session->set_flashdata('notif', 'Tambah menu gagal');
						redirect('menu/index');
					}
				// } else {
				// 	$this->session->set_flashdata('notif', 'Tambah menu gagal upload');
				// 	redirect('menu/index');
				// }
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('menu/index');
			}
		} else {
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$this->form_validation->set_rules('ubah_kode_masakan', 'ubah_kode_masakan', 'trim|required');
			$this->form_validation->set_rules('ubah_nama_masakan', 'ubah_nama_masakan', 'trim|required');
			$this->form_validation->set_rules('ubah_stok', 'stok', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_harga', 'ubah_harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_status_masakan', 'ubah_status_masakan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->menu_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah Menu berhasil');
					redirect('menu/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah menu gagal');
					redirect('menu/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('menu/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->menu_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus menu Berhasil');
				redirect('menu/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus menu gagal');
				redirect('menu/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_menu_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->menu_model->get_data_menu_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */