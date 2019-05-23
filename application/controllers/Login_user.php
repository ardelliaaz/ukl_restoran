<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class login_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_user_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')==true) {
            redirect('dashboard_user/index');
        } else {
            $this->load->view('login_user_view');
        }
    }

   

    public function cek_login()
    {
        if ($this->session->userdata('logged_in')==false) {
            
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run()== true) {
                if ($this->login_user_model->cek_user()== true) {
                    redirect('dashboard_user/index');
                } else {
                  $this->session->flashdata('notif', 'Login GAGAL');
                  redirect('login_user/index');
                }
                
            } else {
               $this->session->set_flashdata('notif', validation_errors());
               redirect('login_user/index');
            }
            
        } else {
           redirect('dashboard_user/index');
        } 
    }

    public function tambah()
	{
		// if($this->session->userdata('logged_in') == false){
            // $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required');
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('telp', 'telp', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
					if($this->login_user_model->tambah() == TRUE)
					{
						$this->session->set_flashdata('notif', 'Tambah pelanggan berhasil');
						redirect('login_user/index');
					} else {
						$this->session->set_flashdata('notif', 'Tambah pelanggan gagal');
						redirect('login_user/index');
					}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('login_user/index');
			}
		// } else {
		// 	redirect('login_user/index');
		// }
	}

   


    public function logout()
    {  
        $this->session->sess_destroy();
        redirect('login_user');   
    }
}

/* End of file Login.php */


?>