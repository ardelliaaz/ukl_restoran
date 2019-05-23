<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_user_model extends CI_Model {

	public function get_menu_user(){
		return $this->db->get('masakan')
						->result();
	}

	public function get_data_masakan_by_id($id)
	{
		return $this->db->where('id_masakan', $id)
						->get('masakan')
						->row();
	}


}

/* End of file masakan_model.php */
/* Location: ./application/models/Buku_model.php */