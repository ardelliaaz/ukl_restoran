<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_user extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_user_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'menu_user_view';
			$data['masakan'] = $this->menu_user_model->get_menu_user();

			//get_kategori untuk dropdown tambah/edit masakan
			
			$this->load->view('template_user', $data);

		} else {
			redirect('login/index');
		}
	}

}
