<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {

	public function get_jml_makanan(){
		return $this->db->select('count(*) as jml_makanan')
					    ->get('masakan')
					    ->row();
	}

	public function get_jml_transaksi(){
		return $this->db->select('count(*) as jml_transaksi')
					    ->get('order')
					    ->row();
	}

	public function get_jml_pengguna(){
		return $this->db->select('count(*) as jml_pengguna')
					    ->get('pelanggan')
					    ->row();
	}

}

/* End of file Kasir_model.php */
/* Location: ./application/models/Kasir_model.php */